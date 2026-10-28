<?php
/** @var string $title @var string $content @var array $color @var string $logoUrl @var string $siteUrl @var array $site */
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?= e($title) ?></title>
    <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { 
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
                line-height: 1.6; 
                color: #333; 
                background-color: #f8fafc;
            }
            .email-container { 
                max-width: 600px; 
                margin: 20px auto; 
                background: white; 
                border-radius: 12px; 
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }
            .header { 
                background: linear-gradient(135deg, <?= $color['primary'] ?>, <?= $color['secondary'] ?>); 
                color: white; 
                padding: 40px 30px; 
                text-align: center; 
                position: relative;
            }
            .header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"%3E%3Cg opacity="0.1"%3E%3Cpath d="M20 35 L16 25 L24 25 Z" fill="%23ffffff"/%3E%3Ccircle cx="20" cy="22" r="5" fill="%23ffffff"/%3E%3Ccircle cx="20" cy="16" r="4" fill="%23ffffff"/%3E%3C/g%3E%3C/svg%3E');
                background-size: 40px 40px;
            }
            .logo { 
                width: 80px; 
                height: auto; 
                margin-bottom: 15px; 
                position: relative;
                z-index: 2;
            }
            .header h1 { 
                font-size: 28px; 
                margin-bottom: 8px; 
                font-weight: 700;
                position: relative;
                z-index: 2;
            }
            .header p { 
                font-size: 16px; 
                opacity: 0.9;
                position: relative;
                z-index: 2;
            }
            .content { 
                padding: 40px 30px; 
                background: white;
            }
            .content h2 {
                color: <?= $color['primary'] ?>;
                font-size: 24px;
                margin-bottom: 20px;
                border-bottom: 2px solid <?= $color['primary'] ?>;
                padding-bottom: 10px;
            }
            .content h3 {
                color: <?= $color['primary'] ?>;
                font-size: 18px;
                margin: 20px 0 10px 0;
            }
            .info-box {
                background: #f8fafc;
                border-left: 4px solid <?= $color['primary'] ?>;
                padding: 20px;
                margin: 20px 0;
                border-radius: 0 8px 8px 0;
            }
            .button { 
                display: inline-block; 
                background: linear-gradient(135deg, <?= $color['primary'] ?>, <?= $color['secondary'] ?>); 
                color: white; 
                padding: 15px 30px; 
                text-decoration: none; 
                border-radius: 8px; 
                margin: 20px 0;
                font-weight: 600;
                transition: transform 0.2s;
            }
            .button:hover {
                transform: translateY(-2px);
            }
            .footer { 
                background: #1f2937; 
                color: #d1d5db; 
                padding: 30px; 
                text-align: center; 
                font-size: 14px;
            }
            .footer-logo {
                width: 60px;
                height: auto;
                margin-bottom: 15px;
                opacity: 0.8;
            }
            .social-links {
                margin: 20px 0;
            }
            .social-links a {
                display: inline-block;
                margin: 0 10px;
                color: <?= $color['primary'] ?>;
                text-decoration: none;
                font-weight: 500;
            }
            .divider {
                height: 1px;
                background: linear-gradient(90deg, transparent, <?= $color['primary'] ?>, transparent);
                margin: 20px 0;
            }
            @media (max-width: 600px) {
                .email-container { margin: 10px; }
                .header, .content, .footer { padding: 20px; }
                .header h1 { font-size: 24px; }
            }
        </style>
</head>
<body>
    <div class='email-container'>
        <div class='header'>
            <img src='<?= e($logoUrl) ?>' alt='<?= e($site['name']) ?>' class='logo'>
            <h1><?= e($site['name']) ?></h1>
            <p>L'excellence de la glace artisanale italienne</p>
        </div>
        <div class='content'>
            <?= $content ?>
        </div>
        <div class='footer'>
            <img src='<?= e($logoUrl) ?>' alt='<?= e($site['name']) ?>' class='footer-logo'>
            <div class='divider'></div>
            <p><strong><?= e($site['name']) ?></strong></p>
            <p><?= e($site['address']) ?></p>
            <p>Téléphone: <?= e($site['phone']) ?></p>
            <div class='social-links'>
                <a href='<?= e($siteUrl) ?>/'>Notre Site Web</a> |
                <a href='<?= e($siteUrl) ?>/contact'>Contact</a> |
                <a href='<?= e($siteUrl) ?>/produits'>Nos Produits</a>
            </div>
            <p style='margin-top: 20px; font-size: 12px; opacity: 0.7;'>
                &copy; <?= date('Y') ?> <?= e($site['name']) ?>. Tous droits réservés.
            </p>
        </div>
    </div>
</body>
</html>
