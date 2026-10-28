<?php

// Allowed values for the "Devenir Partenaire" form. They must match the <option> values in
// views/pages/devenir-glacier.php: anything else is rejected, so forged values never get stored.

return [
    'types' => [
        'franchise'  => 'Franchise',
        'partenaire' => 'Partenaire B2B',
        'matieres'   => 'Matières Premières',
    ],

    'budget' => ['50-100M GF', '100-200M GF', '200-500M GF', '500M+ GF'],

    'disponibilite' => ['Immédiatement', 'Dans 1 mois', 'Dans 3 mois', 'Dans 6 mois', 'Dans 1 an'],

    'type_etablissement' => ['Restaurant', 'Hôtel', 'Supermarché', 'Café / Glacier', 'Autre'],

    'volume' => ['Petit (10-50 unités)', 'Moyen (50-200 unités)', 'Grand (200+ unités)'],

    'produits_interet' => [
        'glaces_barquettes'  => 'Glaces barquettes',
        'cornets_preemballe' => 'Cornets pré-emballés',
        'crepes'             => 'Crêpes',
        'gaufres'            => 'Gaufres',
        'milkshakes'         => 'Milkshakes',
        'tous_produits'      => 'Tous les produits',
    ],

    'profession' => ['Artisan glacier', 'Pâtissier', 'Restaurateur', 'Revendeur', 'Autre'],

    'produits_recherches' => ['Bases lait/crème', 'Purées de fruits', 'Arômes naturels', 'Stabilisateurs', 'Catalogue complet'],
];
