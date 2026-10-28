<?php

declare(strict_types=1);

use App\Config;
use App\Csrf;

/** Escape a value for safe output inside HTML. */
function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Folder the site lives in, with no trailing slash.
 * Empty on a real domain (document root = public/).
 * On XAMPP this is typically /amore-mio-v2.0/amore-mio.
 */
function detect_base_path(): string
{
    $override = trim(str_replace('\\', '/', (string) ($_ENV['APP_BASE_PATH'] ?? '')), '/');
    if ($override !== '') {
        return '/' . $override;
    }

    $script = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? '/index.php'));
    $scriptDir = rtrim(dirname($script), '/');
    if ($scriptDir === '' || $scriptDir === '/' || $scriptDir === '.') {
        return '';
    }

    $uri = str_replace('\\', '/', (string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'));

    if ($uri === $scriptDir || str_starts_with($uri, $scriptDir . '/')) {
        return $scriptDir;
    }

    if (str_ends_with($scriptDir, '/public')) {
        $parent = substr($scriptDir, 0, -strlen('/public'));
        if ($parent !== '' && ($uri === $parent || str_starts_with($uri, $parent . '/'))) {
            return $parent;
        }
    }

    return $scriptDir;
}

/** Site-relative URL that still works under http://localhost/foldername. */
function url(string $path = '/'): string
{
    $base = rtrim((string) Config::get('base_path', ''), '/');
    $hash = '';
    $query = '';
    $hashPos = strpos($path, '#');
    if ($hashPos !== false) {
        $hash = substr($path, $hashPos);
        $path = substr($path, 0, $hashPos);
    }
    $queryPos = strpos($path, '?');
    if ($queryPos !== false) {
        $query = substr($path, $queryPos);
        $path = substr($path, 0, $queryPos);
    }
    $path = '/' . ltrim($path, '/');
    if ($path === '/') {
        return ($base === '' ? '/' : $base . '/') . $query . $hash;
    }
    return $base . $path . $query . $hash;
}

/** Hidden input holding the CSRF token. Put it inside every POST form. */
function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(Csrf::token()) . '">';
}

/**
 * Invisible trap field. People never see it, bots fill it in.
 * It is moved off-screen with inline style so no site CSS is touched.
 */
function honeypot_field(): string
{
    return '<div aria-hidden="true" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">'
        . '<label>Laissez ce champ vide<input type="text" name="website_url" value="" tabindex="-1" autocomplete="off"></label>'
        . '</div>';
}
