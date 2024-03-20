<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
 * Envoie une nouvelle notification de vérification par e-mail.
 */
public function store(Request $request): RedirectResponse
{
    // Vérifie si l'e-mail de l'utilisateur a déjà été vérifié
    if ($request->user()->hasVerifiedEmail()) {
        // Si l'e-mail est déjà vérifié, redirige l'utilisateur vers la page d'origine ou la page d'accueil si non spécifiée
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    // Si l'e-mail n'est pas vérifié, envoie une nouvelle notification de vérification par e-mail à l'utilisateur
    $request->user()->sendEmailVerificationNotification();

    // Redirige l'utilisateur vers la page précédente avec un message de statut indiquant que le lien de vérification a été envoyé
    return back()->with('status', 'verification-link-sent');
}

}
