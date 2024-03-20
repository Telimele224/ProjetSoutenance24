<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
   /**
 * Marque l'adresse e-mail vérifiée de l'utilisateur authentifié.
 */
public function __invoke(EmailVerificationRequest $request): RedirectResponse
{
    // Vérifie si l'adresse e-mail de l'utilisateur a déjà été vérifiée
    if ($request->user()->hasVerifiedEmail()) {
        // Si l'adresse e-mail est déjà vérifiée, redirige l'utilisateur vers la page d'accueil avec le paramètre 'verified' défini à 1
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }

    // Marque l'adresse e-mail de l'utilisateur comme vérifiée
    if ($request->user()->markEmailAsVerified()) {
        // Déclenche l'événement Verified si l'adresse e-mail est marquée comme vérifiée avec succès
        event(new Verified($request->user()));
    }

    // Redirige l'utilisateur vers la page d'accueil avec le paramètre 'verified' défini à 1
    return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
}

}
