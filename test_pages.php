<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$pages = ['/', '/about', '/services', '/works', '/clients', '/start-project', '/login'];
foreach ($pages as $url) {
    $response = $kernel->handle(\Illuminate\Http\Request::create($url));
    echo $url . ': ' . $response->getStatusCode() . PHP_EOL;
}
