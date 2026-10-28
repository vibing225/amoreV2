<?php /** @var array $data @var string $siteUrl @var array $site */ ?>
<h2>🎉 Bonjour <?= e($data['name']) ?> !</h2>
<p>Nous avons bien reçu votre message et vous remercions sincèrement de nous avoir contactés.</p>

<div class='info-box'>
    <h3>📋 Récapitulatif de votre message :</h3>
    <p><strong>👤 Nom :</strong> <?= e($data['name']) ?></p>
    <p><strong>📧 Email :</strong> <?= e($data['email']) ?></p>
    <p><strong>📞 Téléphone :</strong> <?= e($data['phone']) ?></p>
    <p><strong>💬 Message :</strong></p>
    <p style='font-style: italic; margin-top: 10px;'><?= nl2br(e($data['message'])) ?></p>
</div>

<h3>⏰ Que se passe-t-il maintenant ?</h3>
<p>Notre équipe vous répondra dans les <strong>plus brefs délais</strong>, généralement sous 24h.</p>
<p>En attendant, n'hésitez pas à découvrir nos délicieuses glaces artisanales italiennes !</p>

<a href='<?= e($siteUrl) ?>/produits' class='button'>🍦 Découvrir nos Produits</a>

<div class='divider'></div>
<p style='text-align: center; font-style: italic;'>
    Merci de votre confiance et à bientôt chez <?= e($site['name']) ?> ! 🍨
</p>
