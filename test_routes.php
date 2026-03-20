<?php

$r = require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$routes = ['/services/software-development', '/works/berau-coal-erp', '/works/kana-branding'];

foreach ($routes as $uri) {
    try {
        $response = $kernel->handle(Illuminate\Http\Request::create($uri, 'GET'));
        $status = $response->getStatusCode();
        $size = strlen($response->getContent());
        echo "$uri => $status ($size bytes)\n";
        $kernel->terminate(Illuminate\Http\Request::create($uri, 'GET'), $response);
    } catch (\Throwable $e) {
        echo "$uri => ERROR: " . $e->getMessage() . "\n";
    }
}
