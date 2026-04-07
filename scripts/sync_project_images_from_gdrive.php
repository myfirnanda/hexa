<?php

declare(strict_types=1);

/**
 * Download Google Drive images referenced in ProjectSeeder and rewrite to local paths.
 *
 * Usage:
 *   php scripts/sync_project_images_from_gdrive.php
 */

$root = dirname(__DIR__);
$seederPath = $root . '/database/seeders/ProjectSeeder.php';
$targetDir = $root . '/storage/app/public/projects/imported';
$targetPrefix = 'projects/imported';

if (!file_exists($seederPath)) {
    fwrite(STDERR, "Seeder not found: {$seederPath}\n");
    exit(1);
}

if (!is_dir($targetDir) && !mkdir($targetDir, 0777, true) && !is_dir($targetDir)) {
    fwrite(STDERR, "Failed to create target directory: {$targetDir}\n");
    exit(1);
}

$content = file_get_contents($seederPath);
if ($content === false) {
    fwrite(STDERR, "Failed to read seeder file.\n");
    exit(1);
}

$pattern = '/\[(?:(?!\n\s*\],).)*?\n\s*\],/s';
if (!preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
    fwrite(STDOUT, "No project blocks found.\n");
    exit(0);
}

$stats = [
    'blocks' => 0,
    'downloaded' => 0,
    'skipped' => 0,
    'failed' => 0,
    'updatedBlocks' => 0,
];

$replacements = [];

foreach ($matches[0] as [$block, $offset]) {
    $stats['blocks']++;

    if (!preg_match("/'slug'\s*=>\s*'([^']+)'/", $block, $slugMatch)) {
        continue;
    }
    $slug = $slugMatch[1];

    if (!preg_match("/'image'\s*=>\s*(null|'([^']*)')/", $block, $imageMatch)) {
        continue;
    }

    $imageValue = $imageMatch[1] === 'null' ? null : $imageMatch[2];
    if ($imageValue === null || stripos($imageValue, 'drive.google.com') === false) {
        $stats['skipped']++;
        continue;
    }

    $fileId = extractGoogleDriveId($imageValue);
    if ($fileId === null) {
        fwrite(STDERR, "[WARN] Cannot parse file ID for slug {$slug}\n");
        $stats['failed']++;
        continue;
    }

    $downloadResult = downloadGoogleDriveFile($fileId, $slug, $targetDir);
    if (!$downloadResult['ok']) {
        fwrite(STDERR, "[WARN] Download failed for {$slug}: {$downloadResult['error']}\n");
        $stats['failed']++;
        continue;
    }

    $relativePath = $targetPrefix . '/' . $downloadResult['filename'];

    $newBlock = preg_replace(
        "/('image'\s*=>\s*)'[^']*'/",
        "$1'{$relativePath}'",
        $block,
        1
    );

    if ($newBlock === null) {
        fwrite(STDERR, "[WARN] Failed to update image for {$slug}\n");
        $stats['failed']++;
        continue;
    }

    $newBlock2 = preg_replace(
        "/('images'\s*=>\s*\[)\s*'[^']*'(\s*\],)/",
        "$1'{$relativePath}'$2",
        $newBlock,
        1
    );

    if ($newBlock2 === null) {
        fwrite(STDERR, "[WARN] Failed to update images array for {$slug}\n");
        $stats['failed']++;
        continue;
    }

    if ($newBlock2 !== $block) {
        $replacements[] = [
            'offset' => $offset,
            'length' => strlen($block),
            'replacement' => $newBlock2,
        ];
        $stats['updatedBlocks']++;
    }

    $stats['downloaded']++;
    fwrite(STDOUT, "[OK] {$slug} -> {$relativePath}\n");
}

if (!empty($replacements)) {
    // Apply from end to start to keep offsets valid.
    usort($replacements, static fn(array $a, array $b): int => $b['offset'] <=> $a['offset']);
    foreach ($replacements as $r) {
        $content = substr_replace($content, $r['replacement'], $r['offset'], $r['length']);
    }

    if (file_put_contents($seederPath, $content) === false) {
        fwrite(STDERR, "Failed to write updated seeder file.\n");
        exit(1);
    }
}

fwrite(STDOUT, "\nDone.\n");
fwrite(STDOUT, "Blocks checked : {$stats['blocks']}\n");
fwrite(STDOUT, "Downloaded     : {$stats['downloaded']}\n");
fwrite(STDOUT, "Updated blocks : {$stats['updatedBlocks']}\n");
fwrite(STDOUT, "Skipped        : {$stats['skipped']}\n");
fwrite(STDOUT, "Failed         : {$stats['failed']}\n");

exit(0);

function extractGoogleDriveId(string $url): ?string
{
    if (preg_match('~/d/([a-zA-Z0-9_-]+)~', $url, $m)) {
        return $m[1];
    }

    if (preg_match('~[?&]id=([a-zA-Z0-9_-]+)~', $url, $m)) {
        return $m[1];
    }

    return null;
}

function downloadGoogleDriveFile(string $fileId, string $slug, string $targetDir): array
{
    $cookieFile = tempnam(sys_get_temp_dir(), 'gdcookie_');
    if ($cookieFile === false) {
        return ['ok' => false, 'error' => 'cannot create cookie file'];
    }

    $initialUrl = 'https://drive.google.com/uc?export=download&id=' . rawurlencode($fileId);

    $first = httpRequest($initialUrl, $cookieFile);
    if (!$first['ok']) {
        @unlink($cookieFile);
        return ['ok' => false, 'error' => $first['error']];
    }

    $final = $first;

    // If Google returns HTML confirmation page, retry with confirm token.
    $ctype = strtolower($first['contentType']);
    if (str_contains($ctype, 'text/html')) {
        $confirmToken = null;

        if (preg_match('~confirm=([0-9A-Za-z_-]+)~', $first['body'], $m)) {
            $confirmToken = $m[1];
        }

        if ($confirmToken !== null) {
            $confirmUrl = 'https://drive.google.com/uc?export=download&confirm=' . rawurlencode($confirmToken) . '&id=' . rawurlencode($fileId);
            $second = httpRequest($confirmUrl, $cookieFile);
            if ($second['ok']) {
                $final = $second;
                $ctype = strtolower($final['contentType']);
            }
        }
    }

    @unlink($cookieFile);

    if (str_contains($ctype, 'text/html')) {
        return ['ok' => false, 'error' => 'received HTML page instead of binary file'];
    }

    if ($final['body'] === '') {
        return ['ok' => false, 'error' => 'empty response body'];
    }

    $ext = detectExtension($final['contentType'], $final['effectiveUrl']);
    $filename = $slug . '-' . $fileId . '.' . $ext;
    $fullPath = $targetDir . '/' . $filename;

    if (file_put_contents($fullPath, $final['body']) === false) {
        return ['ok' => false, 'error' => 'failed to write file'];
    }

    return ['ok' => true, 'filename' => $filename];
}

function httpRequest(string $url, string $cookieFile): array
{
    $ch = curl_init($url);
    if ($ch === false) {
        return ['ok' => false, 'error' => 'curl_init failed'];
    }

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_CONNECTTIMEOUT => 20,
        CURLOPT_TIMEOUT => 120,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36',
        CURLOPT_HTTPHEADER => ['Accept: */*'],
        CURLOPT_COOKIEJAR => $cookieFile,
        CURLOPT_COOKIEFILE => $cookieFile,
        CURLOPT_HEADER => true,
    ]);

    $response = curl_exec($ch);
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        return ['ok' => false, 'error' => $error !== '' ? $error : 'curl_exec failed'];
    }

    $headerSize = (int) curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $contentType = (string) curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    $effectiveUrl = (string) curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $body = substr($response, $headerSize);

    if ($status >= 400) {
        return ['ok' => false, 'error' => 'HTTP ' . $status, 'body' => $body, 'contentType' => $contentType, 'effectiveUrl' => $effectiveUrl];
    }

    return [
        'ok' => true,
        'body' => $body,
        'contentType' => $contentType,
        'effectiveUrl' => $effectiveUrl,
    ];
}

function detectExtension(string $contentType, string $effectiveUrl): string
{
    $contentType = strtolower(trim(explode(';', $contentType)[0]));

    $map = [
        'image/jpeg' => 'jpg',
        'image/jpg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif',
        'image/svg+xml' => 'svg',
        'application/pdf' => 'pdf',
    ];

    if (isset($map[$contentType])) {
        return $map[$contentType];
    }

    $path = parse_url($effectiveUrl, PHP_URL_PATH);
    if (is_string($path)) {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if ($ext !== '') {
            return strtolower($ext);
        }
    }

    return 'jpg';
}
