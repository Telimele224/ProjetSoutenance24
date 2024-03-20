<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
   /**
 * Affiche la vue de confirmation du mot de passe.
 */
public function show(): View
{
    return view('auth.confirm-password'); // Retourne la vue pour la confirmation du mot de passe
}

/**
 * Confirme le mot de passe de l'utilisateur.
 */
public function store(Request $request): RedirectResponse
{
    // Vérifie si le mot de passe fourni correspond à celui de l'utilisateur
    if (!Auth::guard('web')->validate([
        'email' => $request->user()->email, // Récupère l'e-mail de l'utilisateur actuel
        'password' => $request->password,   // Récupère le mot de passe fourni dans la requête
    ])) {
        // Si le mot de passe est incorrect, lance une exception de validation avec un message approprié
        throw ValidationException::withMessages([
            'password' => __('auth.password'),
        ]);
    }

    // Stocke l'heure à laquelle le mot de passe a été confirmé dans la session
    $request->session()->put('auth.password_confirmed_at', time());

    // Redirige l'utilisateur vers la page d'origine ou la page d'accueil si non spécifiée
    return redirect()->intended(RouteServiceProvider::HOME);
}

}
