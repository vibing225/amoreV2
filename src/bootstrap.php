<?php

declare(strict_types=1);

use App\Config;
use App\Logger;
use App\Router;
use App\Session;

$root     = dirname(__DIR__);
$autoload = $root . '/vendor/autoload.php';

if (!is_file($autoload)) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=UTF-8');
    exit('Dependencies are missing. Run "composer install --no-dev --optimize-autoloader" in the project folder.');
}
require $autoload;

// 1. Settings: .env first, then config/app.php
if (is_file($root . '/.env')) {
    Dotenv\Dotenv::createImmutable($root)->safeLoad();
}
$app = require $root . '/config/app.php';
$app['base_path'] = detect_base_path();
if ($app['url'] === '') {
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || strtolower((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https';
    $host = (string) ($_SERVER['HTTP_HOST'] ?? 'localhost');
    $app['url'] = ($https ? 'https' : 'http') . '://' . $host . $app['base_path'];
}
Config::load($app);

// 2. Errors: never shown to visitors in production, always written to storage/logs
$debug = (bool) Config::get('debug');
error_reporting(E_ALL);
ini_set('display_errors', $debug ? '1' : '0');
ini_set('log_errors', '1');
ini_set('error_log', Config::get('paths.logs') . '/php-error.log');
date_default_timezone_set('Africa/Conakry');

set_exception_handler(static function (Throwable $e) use ($debug, $root): void {
    Logger::error($e::class . ': ' . $e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
    if (!headers_sent()) {
        http_response_code(500);
        header('Content-Type: text/html; charset=UTF-8');
    }
    if ($debug) {
        echo '<pre>' . htmlspecialchars((string) $e, ENT_QUOTES, 'UTF-8') . '</pre>';
        return;
    }
    include $root . '/views/errors/500.php';
});

// 3. HTTPS redirect (turn on with FORCE_HTTPS=true once https:// works)
if (Config::get('force_https') && PHP_SAPI !== 'cli-server' && !Session::isHttps()) {
    $host = (string) ($_SERVER['HTTP_HOST'] ?? '');
    if (!preg_match('/^[A-Za-z0-9.-]+(:\d+)?$/', $host)) {
        $host = (string) parse_url((string) Config::get('url'), PHP_URL_HOST);
    }
    if ($host !== '') {
        header('Location: https://' . $host . ($_SERVER['REQUEST_URI'] ?? '/'), true, 301);
        exit;
    }
}

// 4. Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
if (Session::isHttps()) {
    header('Strict-Transport-Security: max-age=31536000');
}

// 5. Session and routes
Session::start();

$router = new Router();
(require $root . '/config/routes.php')($router);

return $router;
