<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
                // Valide les données de la requête
        $request->validate([
            'token' => ['required'], // Le jeton de réinitialisation du mot de passe est requis
            'email' => ['required', 'email'], // L'adresse e-mail est requise et doit être au bon format
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Le mot de passe est requis, doit être confirmé et doit respecter les règles de validation définies par défaut
        ]);

        // Ici, nous tenterons de réinitialiser le mot de passe de l'utilisateur. Si cela réussit, nous
        // mettrons à jour le mot de passe sur un véritable modèle utilisateur et le persisterons dans la
        // base de données. Sinon, nous analyserons l'erreur et renverrons la réponse.
        $status = Password::reset(
            // Les données nécessaires pour réinitialiser le mot de passe
            $request->only('email', 'password', 'password_confirmation', 'token'),
            // Fonction de rappel qui sera exécutée si la réinitialisation réussit
            function ($user) use ($request) {
                // Mise à jour du mot de passe de l'utilisateur et génération d'un nouveau jeton de rappel
                $user->forceFill([
                    'password' => Hash::make($request->password), // Hashage du nouveau mot de passe
                    'remember_token' => Str::random(60), // Génération d'un nouveau jeton de rappel
                ])->save(); // Sauvegarde du modèle utilisateur mis à jour dans la base de données

                // Déclenche l'événement PasswordReset
                event(new PasswordReset($user));
            }
        );

        // Si le mot de passe a été réinitialisé avec succès, nous redirigerons l'utilisateur vers
        // la vue d'authentification de l'application. S'il y a une erreur, nous pouvons
        // le rediriger vers l'endroit d'où il vient avec son message d'erreur.
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status)) // Redirection vers la page de connexion avec un message de succès
            : back()->withInput($request->only('email')) // Redirection vers la page précédente avec les données saisies par l'utilisateur
                    ->withErrors(['email' => __($status)]); // Affichage du message d'erreur

    }
}
