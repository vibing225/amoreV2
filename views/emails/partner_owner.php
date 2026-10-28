<?php /** @var array $data @var array $details @var string $typeLabel @var string $siteUrl */ ?>
<h2>🏪 Nouvelle Candidature : <?= e($typeLabel) ?></h2>
<p>Vous avez reçu une nouvelle candidature via le formulaire « Devenir Partenaire ».</p>

<div class='info-box'>
    <h3>👤 Informations personnelles :</h3>
    <p><strong>Nom :</strong> <?= e($data['last_name']) ?></p>
    <p><strong>Prénom :</strong> <?= e($data['first_name']) ?></p>
    <p><strong>📧 Email :</strong> <a href='mailto:<?= e($data['email']) ?>'><?= e($data['email']) ?></a></p>
    <p><strong>📞 Téléphone :</strong> <a href='tel:<?= e($data['phone']) ?>'><?= e($data['phone']) ?></a></p>
    <p><strong>🏢 Entreprise / Commerce :</strong> <?= e($data['company']) ?></p>
    <p><strong>🏙️ Ville :</strong> <?= e($data['city']) ?></p>
</div>

<div class='info-box'>
    <h3>📋 Détails (<?= e($typeLabel) ?>) :</h3>
    <?php foreach ($details as $label => $value): ?>
        <p><strong><?= e($label) ?> :</strong> <?= nl2br(e($value)) ?></p>
    <?php endforeach; ?>
</div>

<?php if ($data['message'] !== ''): ?>
    <div class='info-box'>
        <h3>💬 Message :</h3>
        <p><?= nl2br(e($data['message'])) ?></p>
    </div>
<?php endif; ?>

<p><strong>🕐 Candidature reçue le :</strong> <?= e($data['received_at']) ?></p>

<a href='mailto:<?= e($data['email']) ?>' class='button'>Contacter le Candidat</a>
