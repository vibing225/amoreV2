<?php

declare(strict_types=1);

namespace App;

/** Protects forms against requests sent from other websites. */
final class Csrf
{
    public static function token(): string
    {
        if (empty($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf'];
    }

    public static function verify(mixed $submitted): bool
    {
        $known = $_SESSION['_csrf'] ?? '';
        return is_string($submitted) && $known !== '' && hash_equals($known, $submitted);
    }
}
