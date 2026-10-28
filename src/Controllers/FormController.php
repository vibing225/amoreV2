<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Csrf;
use App\Http;
use App\RateLimiter;
use App\Session;

/** Shared protections for every public form: CSRF token, honeypot, rate limit. */
abstract class FormController
{
    /**
     * Stops the request (with a redirect) when it looks wrong.
     * Bots that fill the hidden field get a fake "success" so they learn nothing.
     */
    protected function guard(string $form, string $redirectTo, string $fakeSuccess): void
    {
        if (!Csrf::verify($_POST['_token'] ?? null)) {
            $this->fail(['Votre session a expiré. Veuillez réessayer.'], $redirectTo);
        }

        if (($_POST['website_url'] ?? '') !== '') {
            Session::flash('success', $fakeSuccess);
            Http::redirect($redirectTo);
        }

        if (RateLimiter::tooMany($form)) {
            $this->fail(['Trop de tentatives. Veuillez réessayer dans quelques minutes.'], $redirectTo);
        }
        RateLimiter::hit($form);
    }

    protected function fail(array $errors, string $redirectTo): never
    {
        Session::flash('errors', $errors);
        Session::flash('old', $this->oldInput());
        Http::redirect($redirectTo);
    }

    /** Text fields to put back in the form after an error (no token, no honeypot, no arrays). */
    protected function oldInput(): array
    {
        $old = [];
        foreach ($_POST as $key => $value) {
            if (is_string($value) && $key !== '_token' && $key !== 'website_url') {
                $old[$key] = mb_substr($value, 0, 5000);
            }
        }
        return $old;
    }

    /** Values for the page after a redirect: success message, errors, previous input. */
    protected function flashData(): array
    {
        return [
            'success_message' => (string) Session::pull('success', ''),
            'errors'          => (array) Session::pull('errors', []),
            'form_data'       => (array) Session::pull('old', []),
        ];
    }
}
