<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur - AMORE MIO</title>
    <style>
        body { font-family: Arial, sans-serif; background: #fef7f7; color: #1a1a1a; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; text-align: center; padding: 1rem; }
        h1 { color: #ec4899; }
        a { color: #ec4899; }
    </style>
</head>
<body>
    <div>
        <h1>Une erreur est survenue</h1>
        <p>Veuillez réessayer dans quelques instants.</p>
        <p><a href="<?= function_exists('url') ? e(url('/')) : '/' ?>">Retour à l'accueil</a></p>
    </div>
</body>
</html>
