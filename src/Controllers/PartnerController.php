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

/** "Devenir Partenaire" form: franchise, B2B partner or raw-materials supplier. */
final class PartnerController extends FormController
{
    private const SUCCESS = 'Votre candidature a été reçue avec succès! Nous vous contacterons sous 48h.';

    public function show(): void
    {
        View::page('/devenir-glacier', $this->flashData());
    }

    public function submit(): void
    {
        $this->guard('partner', '/devenir-glacier', self::SUCCESS);

        $forms = require Config::get('paths.root') . '/config/forms.php';
        $types = array_keys($forms['types']);

        $v = new Validator($_POST);
        $v->in('candidature_type', $types, 'Veuillez choisir un type de candidature');
        $v->required('prenom', 'Le prénom est requis', 100);
        $v->required('nom', 'Le nom est requis', 100);
        $v->email('email', 'Un email valide est requis');
        $v->phone('telephone', 'Un numéro de téléphone valide est requis');
        $v->required('entreprise', "Le nom de l'entreprise est requis", 150);
        $v->required('ville', 'La ville est requise', 100);
        $v->tooLong('message', 5000, 'Le message est trop long (5000 caractères maximum)');

        $type = $v->value('candidature_type');
        if ($type === 'franchise') {
            $v->in('budget', $forms['budget'], "Le budget d'investissement est requis");
            $v->in('disponibilite', $forms['disponibilite'], 'La disponibilité est requise');
            $v->required('experience', "L'expérience professionnelle est requise", 3000);
        } elseif ($type === 'partenaire') {
            $v->in('type_etablissement', $forms['type_etablissement'], "Le type d'établissement est requis");
            $v->in('volume', $forms['volume'], 'Le volume mensuel souhaité est requis');
            $v->atLeastOneOf('produits_interet', array_keys($forms['produits_interet']), 'Choisissez au moins un produit qui vous intéresse');
        } elseif ($type === 'matieres') {
            $v->in('profession', $forms['profession'], 'Votre profession est requise');
            $v->in('produits_recherches', $forms['produits_recherches'], 'Les produits recherchés sont requis');
            $v->required('volume_matieres', 'Le volume mensuel estimé est requis', 100);
        }

        if ($v->fails()) {
            $this->fail($v->errors(), '/devenir-glacier');
        }

        $details = $this->details($type, $v, $forms);
        $data = [
            'first_name'  => $v->value('prenom', 100),
            'last_name'   => $v->value('nom', 100),
            'email'       => $v->value('email', 190),
            'phone'       => $v->value('telephone', 30),
            'company'     => $v->value('entreprise', 150),
            'city'        => $v->value('ville', 100),
            'message'     => $v->value('message', 5000),
            'received_at' => date('d/m/Y à H:i'),
        ];

        // 1. Save first, so the lead is never lost if the email fails.
        $pdo = Database::pdo();
        $pdo->prepare(
            'INSERT INTO franchise_applications (type, first_name, last_name, email, phone, company, city, details, message, ip_address)
             VALUES (:type, :first, :last, :email, :phone, :company, :city, :details, :message, :ip)'
        )->execute([
            ':type'    => $type,
            ':first'   => $data['first_name'],
            ':last'    => $data['last_name'],
            ':email'   => $data['email'],
            ':phone'   => $data['phone'],
            ':company' => $data['company'],
            ':city'    => $data['city'],
            ':details' => json_encode($details, JSON_UNESCAPED_UNICODE),
            ':message' => $data['message'],
            ':ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
        ]);
        $id = (int) $pdo->lastInsertId();

        Session::flash('success', self::SUCCESS);

        // 2. Answer the visitor now, send the emails right after.
        $typeLabel = $forms['types'][$type];
        Http::redirectThen('/devenir-glacier', fn () => $this->sendEmails($id, $data, $details, $typeLabel));
    }

    /** Fields that only exist for one application type, with readable labels (used in the DB and emails). */
    private function details(string $type, Validator $v, array $forms): array
    {
        if ($type === 'franchise') {
            return [
                "Budget d'investissement" => $v->value('budget'),
                'Disponibilité'           => $v->value('disponibilite'),
                'Expérience'              => $v->value('experience', 3000),
            ];
        }
        if ($type === 'partenaire') {
            $labels = array_map(
                static fn (string $key): string => $forms['produits_interet'][$key],
                array_values((array) $_POST['produits_interet'])
            );
            return [
                "Type d'établissement" => $v->value('type_etablissement'),
                'Volume mensuel'       => $v->value('volume'),
                'Produits souhaités'   => implode(', ', $labels),
            ];
        }
        return [
            'Profession'         => $v->value('profession'),
            'Produits recherchés' => $v->value('produits_recherches'),
            'Volume mensuel'     => $v->value('volume_matieres', 100),
        ];
    }

    private function sendEmails(int $id, array $data, array $details, string $typeLabel): void
    {
        $site     = Config::get('site');
        $subjectO = 'Nouvelle candidature Devenir partenaire (' . $typeLabel . ') - ' . $site['name'];
        $subjectC = 'Candidature reçue - Devenir partenaire ' . $site['name'];
        $vars     = ['data' => $data, 'details' => $details, 'typeLabel' => $typeLabel];
        $fullName = $data['first_name'] . ' ' . $data['last_name'];

        $errors = [];
        $errors[] = Mailer::send(
            (string) Config::get('mail.owner'),
            'Propriétaire',
            $subjectO,
            View::email('partner_owner', $vars, $subjectO, 'glacier'),
            $data['email'],
            $fullName
        );
        $errors[] = Mailer::send(
            $data['email'],
            $fullName,
            $subjectC,
            View::email('partner_client', $vars, $subjectC, 'glacier')
        );

        $errors = array_values(array_filter($errors));
        $stmt = Database::pdo()->prepare('UPDATE franchise_applications SET email_sent = :sent, email_error = :error WHERE id = :id');
        $stmt->execute([
            ':sent'  => $errors === [] ? 1 : 0,
            ':error' => $errors === [] ? null : implode(' | ', $errors),
            ':id'    => $id,
        ]);

        if ($errors !== []) {
            Logger::error("Application #{$id} saved but email failed", ['errors' => $errors]);
        }
    }
}
