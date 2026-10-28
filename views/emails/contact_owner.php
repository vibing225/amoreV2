<?php /** @var array $data @var string $siteUrl */ ?>
<h2>📧 Nouveau Message de Contact</h2>
<p>Vous avez reçu un nouveau message via le formulaire de contact de votre site web.</p>

<div class='info-box'>
    <h3>Informations du contact :</h3>
    <p><strong>👤 Nom :</strong> <?= e($data['name']) ?></p>
    <p><strong>📧 Email :</strong> <a href='mailto:<?= e($data['email']) ?>'><?= e($data['email']) ?></a></p>
    <p><strong>📞 Téléphone :</strong> <a href='tel:<?= e($data['phone']) ?>'><?= e($data['phone']) ?></a></p>
</div>

<h3>💬 Message :</h3>
<div class='info-box'>
    <?= nl2br(e($data['message'])) ?>
</div>

<p><strong>🕐 Reçu le :</strong> <?= e($data['received_at']) ?></p>

<a href='mailto:<?= e($data['email']) ?>' class='button'>Répondre Directement</a>
