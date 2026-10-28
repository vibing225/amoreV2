<?php

declare(strict_types=1);

namespace App;

final class Router
{
    /** @var array<string, array<string, callable>> */
    private array $routes = [];

    /** Old ".php" addresses keep working: they are redirected to the new clean ones. */
    private const LEGACY = [
        '/index.php'           => '/',
        '/produits.php'        => '/produits',
        '/points-de-vente.php' => '/points-de-vente',
        '/devenir-glacier.php' => '/devenir-glacier',
        '/contact.php'         => '/contact',
        '/fidelite.php'        => '/fidelite',
    ];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $base = (string) Config::get('base_path', '');
        if ($base !== '' && ($path === $base || str_starts_with($path, $base . '/'))) {
            $path = substr($path, strlen($base)) ?: '/';
        }

        if (isset(self::LEGACY[$path])) {
            $query = parse_url($uri, PHP_URL_QUERY);
            Http::redirect(self::LEGACY[$path] . ($query ? '?' . $query : ''), 301);
        }

        $path   = $path === '/' ? '/' : rtrim($path, '/');
        $method = $method === 'HEAD' ? 'GET' : strtoupper($method);

        if (isset($this->routes[$method][$path])) {
            ($this->routes[$method][$path])();
            return;
        }

        $allowed = [];
        foreach ($this->routes as $verb => $paths) {
            if (isset($paths[$path])) {
                $allowed[] = $verb;
            }
        }
        if ($allowed !== []) {
            http_response_code(405);
            header('Allow: ' . implode(', ', $allowed));
            header('Content-Type: text/plain; charset=UTF-8');
            echo 'Méthode non autorisée.';
            return;
        }

        View::notFound();
    }
}
