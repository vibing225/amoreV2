<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

/** Pages without any dynamic data: home, products, points of sale. */
final class PageController
{
    public function show(string $route): void
    {
        View::page($route);
    }
}
