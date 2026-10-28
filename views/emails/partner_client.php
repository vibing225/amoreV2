<?php /** @var array $data @var array $details @var string $typeLabel @var string $siteUrl @var array $site */ ?>
<h2>🎉 Bonjour <?= e($data['first_name']) ?> <?= e($data['last_name']) ?> !</h2>
<p>Nous avons bien reçu votre candidature (<strong><?= e($typeLabel) ?></strong>) pour <strong><?= e($site['name']) ?></strong>.</p>

<div class='info-box'>
    <h3>📋 Récapitulatif de votre candidature :</h3>
    <p><strong>👤 Candidat :</strong> <?= e($data['first_name']) ?> <?= e($data['last_name']) ?></p>
    <p><strong>📧 Email :</strong> <?= e($data['email']) ?></p>
    <p><strong>📞 Téléphone :</strong> <?= e($data['phone']) ?></p>
    <p><strong>🏢 Entreprise / Commerce :</strong> <?= e($data['company']) ?></p>
    <p><strong>🏙️ Ville :</strong> <?= e($data['city']) ?></p>
    <?php foreach ($details as $label => $value): ?>
        <p><strong><?= e($label) ?> :</strong> <?= nl2br(e($value)) ?></p>
    <?php endforeach; ?>
</div>

<h3>📞 Prochaines étapes :</h3>
<p>Notre équipe va étudier votre dossier et vous contactera dans les <strong>48h</strong> pour :</p>
<ul style='margin: 15px 0; padding-left: 20px;'>
    <li>Discuter de votre projet en détail</li>
    <li>Vous présenter notre concept</li>
    <li>Organiser une rencontre si votre profil correspond</li>
</ul>

<h3>🍦 En attendant :</h3>
<p>Découvrez notre univers et nos produits pour mieux comprendre l'excellence <?= e($site['name']) ?> !</p>

<a href='<?= e($siteUrl) ?>/produits' class='button'>🍨 Découvrir nos Produits</a>

<div class='divider'></div>
<p style='text-align: center; font-style: italic;'>
    Merci pour votre intérêt et à très bientôt ! 🏪
</p>
