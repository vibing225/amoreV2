<?php

declare(strict_types=1);

namespace App;

/** Simple per-visitor limit stored in SQLite: "at most N submissions every W seconds". */
final class RateLimiter
{
    public static function bucket(string $form): string
    {
        return $form . '|' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown');
    }

    public static function tooMany(string $form): bool
    {
        $max    = (int) Config::get('rate_limit.max', 8);
        $window = (int) Config::get('rate_limit.window', 600);

        $stmt = Database::pdo()->prepare('SELECT COUNT(*) FROM rate_limits WHERE bucket = :b AND created_at > :since');
        $stmt->execute([':b' => self::bucket($form), ':since' => time() - $window]);
        return (int) $stmt->fetchColumn() >= $max;
    }

    public static function hit(string $form): void
    {
        $pdo = Database::pdo();
        $pdo->prepare('INSERT INTO rate_limits (bucket, created_at) VALUES (:b, :t)')
            ->execute([':b' => self::bucket($form), ':t' => time()]);

        // Housekeeping: forget old entries now and then.
        if (random_int(1, 20) === 1) {
            $pdo->prepare('DELETE FROM rate_limits WHERE created_at < :old')
                ->execute([':old' => time() - 86400]);
        }
    }
}
