<?php

declare(strict_types=1);

// All settings in one place. Secrets come from the ".env" file, never from here.

$env = static fn (string $key, string $default = ''): string => (string) (($_ENV[$key] ?? '') !== '' ? $_ENV[$key] : $default);
$root = dirname(__DIR__);

return [
    'env'   => $env('APP_ENV', 'production'),
    'debug' => filter_var($env('APP_DEBUG', 'false'), FILTER_VALIDATE_BOOLEAN),
    'url'   => rtrim($env('APP_URL'), '/'),
    'force_https' => filter_var($env('FORCE_HTTPS', 'false'), FILTER_VALIDATE_BOOLEAN),

    'paths' => [
        'root'     => $root,
        'views'    => $root . '/views',
        'storage'  => $root . '/storage',
        'logs'     => $root . '/storage/logs',
        'sessions' => $root . '/storage/sessions',
        'database' => $root . '/storage/amore.sqlite',
    ],

    'site' => [
        'name'    => 'AMORE MIO',
        'tagline' => "Sweet Creamy - L'excellence de la glace artisanale",
        // Placeholders shown on the live site today: replace them in ".env" when the real ones are known.
        'phone'   => $env('SITE_PHONE', '+224 123 456 789'),
        'email'   => $env('SITE_EMAIL', 'contact@amoremio.gn'),
        'address' => $env('SITE_ADDRESS', 'Quartier Almamya, Conakry, Guinée'),
    ],

    'mail' => [
        'host'       => $env('SMTP_HOST'),
        'port'       => (int) $env('SMTP_PORT', '587'),
        'encryption' => strtolower($env('SMTP_ENCRYPTION', 'tls')),
        'username'   => $env('SMTP_USERNAME'),
        'password'   => $env('SMTP_PASSWORD'),
        'from_email' => $env('MAIL_FROM_EMAIL', $env('SMTP_USERNAME')),
        'from_name'  => $env('MAIL_FROM_NAME', 'AMORE MIO'),
        'owner'      => $env('OWNER_EMAIL'),
    ],

    // Form spam protection: at most "max" submissions per visitor and per form every "window" seconds.
    'rate_limit' => ['max' => 8, 'window' => 600],

    'pages' => [
        '/' => [
            'view' => 'index', 'title' => 'Accueil',
            'description' => "AMORE MIO, glacier artisanal italien à Conakry : glaces, milkshakes, crêpes et boissons préparés avec passion.",
        ],
        '/produits' => [
            'view' => 'produits', 'title' => 'Nos Produits',
            'description' => "Découvrez les glaces artisanales, cornets, milkshakes, crêpes et boissons chaudes d'AMORE MIO.",
        ],
        '/points-de-vente' => [
            'view' => 'points-de-vente', 'title' => 'Points de Vente',
            'description' => "Où trouver les glaces AMORE MIO à Conakry : supermarchés, restaurants, hôtels et glaciers partenaires.",
        ],
        '/devenir-glacier' => [
            'view' => 'devenir-glacier', 'title' => 'Devenir Partenaire',
            'description' => "Devenez franchisé, partenaire ou fournisseur AMORE MIO : envoyez votre candidature en quelques minutes.",
        ],
        '/fidelite' => [
            'view' => 'fidelite', 'title' => 'Carte de Fidélité',
            'description' => "La carte de fidélité AMORE MIO : avantages, niveaux et programme ambassadeur.",
        ],
        '/contact' => [
            'view' => 'contact', 'title' => 'Contact',
            'description' => "Contactez AMORE MIO à Conakry : adresses, horaires et formulaire de contact.",
        ],
    ],
];
