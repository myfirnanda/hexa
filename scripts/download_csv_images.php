<?php
/**
 * Download all project cover images from CSV Google Drive links.
 * - Reads CSV directly
 * - Downloads each cover image from Google Drive
 * - Saves to storage/app/public/projects/{slug}.{ext}
 * - Copies to public/assets/img/projects/{slug}.{ext}
 * - Rewrites ProjectSeeder.php with new local image paths
 */

$basePath = realpath(__DIR__ . '/..');
$csvPath  = 'C:\\Users\\Leonovo\\Downloads\\DOKUMEN REVAMP HEXAVARA WEBSITE - Project.csv';

$storageDest = $basePath . '/storage/app/public/projects';
$publicDest  = $basePath . '/public/assets/img/projects';
$seederPath  = $basePath . '/database/seeders/ProjectSeeder.php';

// Ensure directories exist
if (!is_dir($storageDest)) mkdir($storageDest, 0755, true);
if (!is_dir($publicDest))  mkdir($publicDest, 0755, true);

// ─── Parse CSV (using fgetcsv to handle multiline fields) ──────────────────
$csvRows = [];
if (($handle = fopen($csvPath, 'r')) !== false) {
    $header = fgetcsv($handle); // Read header
    while (($row = fgetcsv($handle)) !== false) {
        if (count($row) >= 6 && !empty(trim($row[0]))) {
            $csvRows[] = $row;
        }
    }
    fclose($handle);
}

echo "=== CSV Image Downloader ===" . PHP_EOL;
echo "Total projects in CSV: " . count($csvRows) . PHP_EOL;
echo "Storage dest: {$storageDest}" . PHP_EOL;
echo "Public dest:  {$publicDest}" . PHP_EOL;
echo str_repeat('─', 60) . PHP_EOL;

// ─── Helper: Generate slug ──────────────────────────────────────────────────
function makeSlug(string $name): string
{
    $slug = mb_strtolower($name);
    // Replace special chars
    $slug = str_replace(['&', '.', '–', '—', ',', '(', ')', "'", '"'], ['and', '', '-', '-', '', '', '', '', ''], $slug);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

// ─── Helper: Extract Google Drive file ID ───────────────────────────────────
function extractDriveId(string $url): ?string
{
    if (preg_match('#/d/([a-zA-Z0-9_-]+)#', $url, $m)) {
        return $m[1];
    }
    if (preg_match('#[?&]id=([a-zA-Z0-9_-]+)#', $url, $m)) {
        return $m[1];
    }
    return null;
}

// ─── Helper: Download from Google Drive ─────────────────────────────────────
function downloadFromDrive(string $fileId, string $destPath): bool
{
    $url = "https://drive.google.com/uc?export=download&id={$fileId}";

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 120,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
        CURLOPT_COOKIEJAR      => sys_get_temp_dir() . '/gdrive_cookie_' . $fileId,
        CURLOPT_COOKIEFILE     => sys_get_temp_dir() . '/gdrive_cookie_' . $fileId,
        CURLOPT_HEADER         => true,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    curl_close($ch);

    if ($httpCode !== 200 || empty($body)) {
        return false;
    }

    // Check for virus scan warning / large file confirmation page
    if (strpos($body, 'download_warning') !== false || strpos($body, 'confirm=') !== false) {
        // Extract confirmation token
        if (preg_match('/confirm=([0-9A-Za-z_-]+)/', $body, $m)) {
            $confirmUrl = "https://drive.google.com/uc?export=download&confirm={$m[1]}&id={$fileId}";
        } elseif (preg_match('/action="([^"]+)"/', $body, $m)) {
            $confirmUrl = html_entity_decode($m[1]);
        } else {
            // Try uuid approach
            $confirmUrl = "https://drive.google.com/uc?export=download&confirm=t&id={$fileId}";
        }

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $confirmUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            CURLOPT_COOKIEJAR      => sys_get_temp_dir() . '/gdrive_cookie_' . $fileId,
            CURLOPT_COOKIEFILE     => sys_get_temp_dir() . '/gdrive_cookie_' . $fileId,
            CURLOPT_HEADER         => true,
        ]);

        $response = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);
        curl_close($ch);
    }

    // Also handle the HTML "too large for virus scan" page
    if (strlen($body) < 200000 && stripos($body, '<html') !== false && stripos($body, 'virus scan') !== false) {
        $confirmUrl = "https://drive.google.com/uc?export=download&confirm=t&id={$fileId}";
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $confirmUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            CURLOPT_COOKIEJAR      => sys_get_temp_dir() . '/gdrive_cookie_' . $fileId,
            CURLOPT_COOKIEFILE     => sys_get_temp_dir() . '/gdrive_cookie_' . $fileId,
            CURLOPT_HEADER         => true,
        ]);

        $response = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);
        curl_close($ch);
    }

    // If it's still HTML, it failed
    if (strlen($body) < 5000 && stripos($body, '<html') !== false) {
        return false;
    }

    // Detect extension from Content-Type header
    $ext = 'jpg'; // default
    if (preg_match('/Content-Type:\s*image\/(\w+)/i', $headers, $m)) {
        $typeMap = ['jpeg' => 'jpg', 'png' => 'png', 'webp' => 'webp', 'gif' => 'gif', 'svg+xml' => 'svg'];
        $ext = $typeMap[strtolower($m[1])] ?? strtolower($m[1]);
    }

    // Also try to detect from magic bytes
    if ($ext === 'jpg') {
        $magic = substr($body, 0, 8);
        if (substr($magic, 0, 4) === "\x89PNG") {
            $ext = 'png';
        } elseif (substr($magic, 0, 4) === 'RIFF' && substr($body, 8, 4) === 'WEBP') {
            $ext = 'webp';
        } elseif (substr($magic, 0, 3) === 'GIF') {
            $ext = 'gif';
        }
    }

    // Build full path with extension
    $fullPath = $destPath . '.' . $ext;
    file_put_contents($fullPath, $body);

    // Cleanup cookie
    $cookieFile = sys_get_temp_dir() . '/gdrive_cookie_' . $fileId;
    if (file_exists($cookieFile)) @unlink($cookieFile);

    return file_exists($fullPath) && filesize($fullPath) > 0;
}

// ─── Process each CSV row ───────────────────────────────────────────────────
// CSV columns: 0=Nama Project, 1=Kategori, 2=Summary Title, 3=Hero Description, 4=Deskripsi, 5=Gambar Cover, 6=Gambar Foto

$results    = []; // slug => ['ext' => ..., 'ok' => true/false, 'name' => ...]
$downloaded = 0;
$failed     = 0;
$skipped    = 0;

foreach ($csvRows as $i => $row) {
    $name      = trim($row[0] ?? '');
    $coverUrl  = trim($row[5] ?? '');
    $slug      = makeSlug($name);

    if (empty($coverUrl) || stripos($coverUrl, 'drive.google.com') === false) {
        echo "[SKIP] #{$i}: {$name} — no Google Drive URL" . PHP_EOL;
        $results[$slug] = ['ext' => null, 'ok' => false, 'name' => $name, 'skipped' => true];
        $skipped++;
        continue;
    }

    $fileId = extractDriveId($coverUrl);
    if (!$fileId) {
        echo "[FAIL] #{$i}: {$name} — could not extract file ID from: {$coverUrl}" . PHP_EOL;
        $results[$slug] = ['ext' => null, 'ok' => false, 'name' => $name, 'skipped' => false];
        $failed++;
        continue;
    }

    echo "[DOWN] #{$i}: {$name} (slug: {$slug}, id: {$fileId})... ";

    // Download to storage path (without extension — downloadFromDrive adds it)
    $baseFilePath = $storageDest . '/' . $slug;

    // Remove any existing files with this slug
    foreach (glob($baseFilePath . '.*') as $existing) {
        @unlink($existing);
    }

    $ok = downloadFromDrive($fileId, $baseFilePath);

    if ($ok) {
        // Find the file that was just created
        $createdFiles = glob($baseFilePath . '.*');
        if (!empty($createdFiles)) {
            $createdFile = $createdFiles[0];
            $ext = pathinfo($createdFile, PATHINFO_EXTENSION);
            $fileName = $slug . '.' . $ext;
            $size = round(filesize($createdFile) / 1024, 1);

            // Copy to public directory
            copy($createdFile, $publicDest . '/' . $fileName);

            echo "OK ({$ext}, {$size}KB)" . PHP_EOL;
            $results[$slug] = ['ext' => $ext, 'ok' => true, 'name' => $name, 'skipped' => false];
            $downloaded++;
        } else {
            echo "FAIL (no file created)" . PHP_EOL;
            $results[$slug] = ['ext' => null, 'ok' => false, 'name' => $name, 'skipped' => false];
            $failed++;
        }
    } else {
        echo "FAIL (download error)" . PHP_EOL;
        $results[$slug] = ['ext' => null, 'ok' => false, 'name' => $name, 'skipped' => false];
        $failed++;
    }
}

echo str_repeat('─', 60) . PHP_EOL;
echo "Downloaded: {$downloaded} | Failed: {$failed} | Skipped: {$skipped}" . PHP_EOL;
echo str_repeat('─', 60) . PHP_EOL;

// ─── Now rewrite the ProjectSeeder (line-by-line approach) ─────────────────
echo PHP_EOL . "=== Rewriting ProjectSeeder ===" . PHP_EOL;

$lines = file($seederPath);
$currentSlug = null;
$updated = 0;

for ($li = 0; $li < count($lines); $li++) {
    $line = $lines[$li];

    // Detect slug line: 'slug' => 'some-slug',
    if (preg_match("/'slug'\\s*=>\\s*'([^']+)'/", $line, $m)) {
        $currentSlug = $m[1];
    }

    // If we have a current slug that was downloaded, update image lines
    if ($currentSlug && isset($results[$currentSlug]) && $results[$currentSlug]['ok']) {
        $newPath = "projects/{$currentSlug}.{$results[$currentSlug]['ext']}";

        // Match 'image' => '...' or 'image' => null
        if (preg_match("/^(\\s*'image'\\s*=>\\s*)(.+?)(,\\s*)$/", $line, $m)) {
            $lines[$li] = $m[1] . "'{$newPath}'" . $m[3];
            echo "  Updated image: {$currentSlug} => {$newPath}" . PHP_EOL;
            $updated++;
        }

        // Match 'images' => ['...'] or 'images' => null
        if (preg_match("/^(\\s*'images'\\s*=>\\s*)(.+?)(,\\s*)$/", $line, $m)) {
            $lines[$li] = $m[1] . "['{$newPath}']" . $m[3];
        }
    }
}

file_put_contents($seederPath, implode('', $lines));

echo str_repeat('─', 60) . PHP_EOL;
echo "Seeder blocks updated: {$updated}" . PHP_EOL;
echo PHP_EOL . "=== Verification ===" . PHP_EOL;
echo "Files in storage/app/public/projects: " . count(glob($storageDest . '/*.*')) . PHP_EOL;
echo "Files in public/assets/img/projects: " . count(glob($publicDest . '/*.*')) . PHP_EOL;

// Check if any drive.google.com references remain
$remainingDrive = preg_match_all('/drive\.google\.com/', $seederContent);
echo "Remaining drive.google.com refs in seeder: {$remainingDrive}" . PHP_EOL;

echo PHP_EOL . "Done!" . PHP_EOL;
