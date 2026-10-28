<?php

declare(strict_types=1);

use App\Controllers\ContactController;
use App\Controllers\FideliteController;
use App\Controllers\PageController;
use App\Controllers\PartnerController;
use App\Router;

// Public addresses of the site. Old ".php" addresses are redirected inside the Router.
return static function (Router $router): void {
    $pages = new PageController();
    foreach (['/', '/produits', '/points-de-vente'] as $route) {
        $router->get($route, static fn () => $pages->show($route));
    }

    $contact = new ContactController();
    $router->get('/contact', [$contact, 'show']);
    $router->post('/contact', [$contact, 'submit']);

    $partner = new PartnerController();
    $router->get('/devenir-glacier', [$partner, 'show']);
    $router->post('/devenir-glacier', [$partner, 'submit']);

    // Public page kept, backend dropped for now.
    $fidelite = new FideliteController();
    $router->get('/fidelite', [$fidelite, 'show']);
    $router->post('/fidelite', [$fidelite, 'submit']);
};
