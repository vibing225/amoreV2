<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Http;
use App\View;

/**
 * Loyalty card page. The page is public but has no backend yet (owner decision):
 * nothing is saved and no email is sent. The form just brings the visitor back to the page.
 */
final class FideliteController
{
    public function show(): void
    {
        View::page('/fidelite', ['success_message' => '', 'errors' => [], 'form_data' => []]);
    }

    public function submit(): void
    {
        Http::redirect('/fidelite');
    }
}
