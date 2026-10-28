<?php

declare(strict_types=1);

namespace App;

use PDO;

/** One shared SQLite connection. Tables are created automatically on first use. */
final class Database
{
    private static ?PDO $pdo = null;

    public static function pdo(): PDO
    {
        if (self::$pdo === null) {
            $path = (string) Config::get('paths.database');
            $pdo = new PDO('sqlite:' . $path, null, null, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
            $pdo->exec('PRAGMA busy_timeout = 5000');
            self::migrate($pdo);
            self::$pdo = $pdo;
        }
        return self::$pdo;
    }

    private static function migrate(PDO $pdo): void
    {
        // status: new -> read -> archived (changed by hand for now).
        // email_sent: 1 when the notification email left successfully.
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS contact_messages (
                id          INTEGER PRIMARY KEY AUTOINCREMENT,
                name        TEXT NOT NULL,
                email       TEXT NOT NULL,
                phone       TEXT NOT NULL,
                message     TEXT NOT NULL,
                ip_address  TEXT,
                status      TEXT NOT NULL DEFAULT 'new',
                email_sent  INTEGER NOT NULL DEFAULT 0,
                email_error TEXT,
                created_at  TEXT NOT NULL DEFAULT (datetime('now'))
            )
        ");
        // type: franchise | partenaire | matieres. Fields that only exist for one type live in "details" (JSON).
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS franchise_applications (
                id          INTEGER PRIMARY KEY AUTOINCREMENT,
                type        TEXT NOT NULL,
                first_name  TEXT NOT NULL,
                last_name   TEXT NOT NULL,
                email       TEXT NOT NULL,
                phone       TEXT NOT NULL,
                company     TEXT NOT NULL,
                city        TEXT NOT NULL,
                details     TEXT NOT NULL DEFAULT '{}',
                message     TEXT,
                ip_address  TEXT,
                status      TEXT NOT NULL DEFAULT 'new',
                email_sent  INTEGER NOT NULL DEFAULT 0,
                email_error TEXT,
                created_at  TEXT NOT NULL DEFAULT (datetime('now'))
            )
        ");
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS rate_limits (
                id         INTEGER PRIMARY KEY AUTOINCREMENT,
                bucket     TEXT NOT NULL,
                created_at INTEGER NOT NULL
            )
        ");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_rate_limits_bucket ON rate_limits (bucket, created_at)');
    }
}
