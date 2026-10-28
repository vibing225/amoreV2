<?php

declare(strict_types=1);

namespace App;

/** Renders a page view inside views/layout.php, or an email view inside views/emails/layout.php. */
final class View
{
    /** Render the page registered for $route in config/app.php ("pages"). */
    public static function page(string $route, array $data = [], int $status = 200): void
    {
        $page = Config::get('pages.' . $route);
        // Config::get splits on dots only, so routes like "/produits" work as keys.
        if (!is_array($page)) {
            throw new \RuntimeException("No page registered for route {$route}");
        }
        self::output($page['view'], $data, (string) ($page['title'] ?? ''), (string) ($page['description'] ?? ''), $route, $status);
    }

    public static function notFound(): void
    {
        self::output('404', [], 'Page introuvable', "Cette page n'existe pas sur le site AMORE MIO.", '', 404);
    }

    /** Render an email body and wrap it in the shared email layout. Returns the HTML. */
    public static function email(string $name, array $vars, string $title, string $type = 'contact'): string
    {
        $colors = [
            'contact' => ['primary' => '#ec4899', 'secondary' => '#f472b6'],
            'glacier' => ['primary' => '#059669', 'secondary' => '#10b981'],
        ];
        $siteUrl = (string) Config::get('url', '');
        $common = [
            'site'    => Config::get('site'),
            'siteUrl' => $siteUrl,
            'logoUrl' => $siteUrl . '/assets/images/Logo_Amore_Mio.png',
            'color'   => $colors[$type] ?? $colors['contact'],
            'title'   => $title,
        ];
        $views = (string) Config::get('paths.views');
        $content = self::capture("{$views}/emails/{$name}.php", $vars + $common);
        return self::capture("{$views}/emails/layout.php", ['content' => $content] + $common);
    }

    private static function output(string $view, array $data, string $title, string $description, string $current, int $status): void
    {
        $site  = Config::get('site');
        $views = (string) Config::get('paths.views');

        $content = self::capture("{$views}/pages/{$view}.php", $data + ['site' => $site]);

        $pageTitle = $title !== ''
            ? $title . ' - ' . $site['name']
            : $site['name'] . ' - ' . $site['tagline'];

        $html = self::capture("{$views}/layout.php", [
            'content'         => $content,
            'pageTitle'       => $pageTitle,
            'metaDescription' => $description,
            'current'         => $current,
            'site'            => $site,
        ]);

        http_response_code($status);
        header('Content-Type: text/html; charset=UTF-8');
        echo $html;
    }

    private static function capture(string $__file, array $__vars): string
    {
        extract($__vars, EXTR_SKIP);
        ob_start();
        try {
            include $__file;
        } catch (\Throwable $e) {
            ob_end_clean();
            throw $e;
        }
        return (string) ob_get_clean();
    }
}
