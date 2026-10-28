<?php

declare(strict_types=1);

namespace App;

use PHPMailer\PHPMailer\PHPMailer;

/** Thin wrapper around PHPMailer. Never throws: returns null on success or an error message. */
final class Mailer
{
    public static function isConfigured(): bool
    {
        return Config::get('mail.host') !== ''
            && Config::get('mail.username') !== ''
            && Config::get('mail.password') !== ''
            && Config::get('mail.from_email') !== '';
    }

    public static function send(string $toEmail, string $toName, string $subject, string $html, ?string $replyTo = null, ?string $replyToName = null): ?string
    {
        if ($toEmail === '') {
            return 'Recipient email is empty (OWNER_EMAIL missing in .env)';
        }
        if (!self::isConfigured()) {
            return 'SMTP is not configured (check SMTP_* values in .env)';
        }

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = (string) Config::get('mail.host');
            $mail->Port       = (int) Config::get('mail.port');
            $mail->SMTPAuth   = true;
            $mail->Username   = (string) Config::get('mail.username');
            $mail->Password   = (string) Config::get('mail.password');
            $mail->SMTPSecure = Config::get('mail.encryption') === 'ssl'
                ? PHPMailer::ENCRYPTION_SMTPS
                : PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Timeout    = 15;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom((string) Config::get('mail.from_email'), (string) Config::get('mail.from_name'));
            $mail->addAddress($toEmail, $toName);
            if ($replyTo !== null && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($replyTo, (string) $replyToName);
            }

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $html;
            $mail->AltBody = trim(strip_tags(preg_replace('/<style.*?<\/style>/is', '', $html) ?? $html));

            $mail->send();
            return null;
        } catch (\Throwable $e) {
            return $mail->ErrorInfo !== '' ? $mail->ErrorInfo : $e->getMessage();
        }
    }
}
