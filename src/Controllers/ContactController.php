<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config;
use App\Database;
use App\Http;
use App\Logger;
use App\Mailer;
use App\Session;
use App\Validator;
use App\View;

final class ContactController extends FormController
{
    private const SUCCESS = 'Votre message a été reçu avec succès! Vous recevrez une confirmation par email dans quelques instants.';

    public function show(): void
    {
        $locations = require Config::get('paths.root') . '/config/locations.php';
        View::page('/contact', $this->flashData() + ['locations' => $locations]);
    }

    public function submit(): void
    {
        $this->guard('contact', '/contact', self::SUCCESS);

        $v = new Validator($_POST);
        $v->required('nom', 'Le nom est requis', 100);
        $v->email('email', 'Un email valide est requis');
        $v->phone('telephone', 'Un numéro de téléphone valide est requis');
        $v->required('message', 'Le message est requis', 5000);
        $v->tooLong('message', 5000, 'Le message est trop long (5000 caractères maximum)');
        if ($v->fails()) {
            $this->fail($v->errors(), '/contact');
        }

        $data = [
            'name'        => $v->value('nom', 100),
            'email'       => $v->value('email', 190),
            'phone'       => $v->value('telephone', 30),
            'message'     => $v->value('message', 5000),
            'received_at' => date('d/m/Y à H:i'),
        ];

        // 1. Save first, so the lead is never lost if the email fails.
        $pdo = Database::pdo();
        $pdo->prepare(
            'INSERT INTO contact_messages (name, email, phone, message, ip_address)
             VALUES (:name, :email, :phone, :message, :ip)'
        )->execute([
            ':name'    => $data['name'],
            ':email'   => $data['email'],
            ':phone'   => $data['phone'],
            ':message' => $data['message'],
            ':ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
        ]);
        $id = (int) $pdo->lastInsertId();

        Session::flash('success', self::SUCCESS);

        // 2. Answer the visitor now, send the emails right after.
        Http::redirectThen('/contact', fn () => $this->sendEmails($id, $data));
    }

    private function sendEmails(int $id, array $data): void
    {
        $site     = Config::get('site');
        $subjectO = 'Nouveau message de contact - ' . $site['name'];
        $subjectC = 'Confirmation de réception - ' . $site['name'];

        $errors = [];
        $errors[] = Mailer::send(
            (string) Config::get('mail.owner'),
            'Propriétaire',
            $subjectO,
            View::email('contact_owner', ['data' => $data], $subjectO, 'contact'),
            $data['email'],
            $data['name']
        );
        $errors[] = Mailer::send(
            $data['email'],
            $data['name'],
            $subjectC,
            View::email('contact_client', ['data' => $data], $subjectC, 'contact')
        );

        $errors = array_values(array_filter($errors));
        $stmt = Database::pdo()->prepare('UPDATE contact_messages SET email_sent = :sent, email_error = :error WHERE id = :id');
        $stmt->execute([
            ':sent'  => $errors === [] ? 1 : 0,
            ':error' => $errors === [] ? null : implode(' | ', $errors),
            ':id'    => $id,
        ]);

        if ($errors !== []) {
            Logger::error("Contact message #{$id} saved but email failed", ['errors' => $errors]);
        }
    }
}
