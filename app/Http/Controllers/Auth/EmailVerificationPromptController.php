<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
/**
 * Affiche la demande de vérification de l'e-mail.
 */
public function __invoke(Request $request): RedirectResponse|View
{
    // Vérifie si l'e-mail de l'utilisateur a déjà été vérifié
    return $request->user()->hasVerifiedEmail()
        ? redirect()->intended(RouteServiceProvider::HOME) // Si l'e-mail est déjà vérifié, redirige l'utilisateur vers la page d'origine ou la page d'accueil si non spécifiée
        : view('auth.verify-email'); // Si l'e-mail n'est pas vérifié, affiche la vue pour la vérification de l'e-mail
}

}
