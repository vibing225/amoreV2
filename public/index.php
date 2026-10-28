<?php

declare(strict_types=1);

// Single entry point: every page request ends up here (see public/.htaccess).

// Local development with "php -S localhost:8000 -t public public/index.php": let real files be served as they are.
if (PHP_SAPI === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    if ($path !== '/' && is_file(__DIR__ . $path)) {
        return false;
    }
}

$router = require dirname(__DIR__) . '/src/bootstrap.php';
$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
