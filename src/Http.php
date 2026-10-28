<?php

declare(strict_types=1);

namespace App;

final class Http
{
    public static function redirect(string $to, int $status = 303): never
    {
        header('Location: ' . self::location($to), true, $status);
        exit;
    }

    /**
     * Send the visitor to $to right away, then run $after (slow work such as sending emails)
     * once the response has been delivered, so the page never waits for the mail server.
     */
    public static function redirectThen(string $to, callable $after): void
    {
        ignore_user_abort(true);
        @set_time_limit(60);
        session_write_close();

        header('Location: ' . self::location($to), true, 303);
        header('Connection: close');
        header('Content-Length: 0');

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        } else {
            while (ob_get_level() > 0) {
                @ob_end_flush();
            }
            flush();
        }

        try {
            $after();
        } catch (\Throwable $e) {
            Logger::error('Background task failed: ' . $e->getMessage());
        }
        exit;
    }

    /** Keep in-site redirects working under http://localhost/foldername. */
    private static function location(string $to): string
    {
        if ($to === '' || str_starts_with($to, '#') || preg_match('#^(?:[a-z][a-z0-9+.-]*:)?//#i', $to) === 1) {
            return $to;
        }
        return url($to);
    }
}
