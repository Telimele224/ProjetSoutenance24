<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
                // Valide les données de la requête
        $request->validate([
            'email' => ['required', 'email'], // L'adresse e-mail est requise et doit être au bon format
        ]);

        // Nous enverrons le lien de réinitialisation du mot de passe à cet utilisateur. Une fois que nous aurons tenté
        // d'envoyer le lien, nous examinerons la réponse pour voir le message que nous
        // devons montrer à l'utilisateur. Enfin, nous enverrons une réponse appropriée.
        $status = Password::sendResetLink(
            $request->only('email') // Envoie le lien de réinitialisation du mot de passe pour l'adresse e-mail spécifiée
        );

        // Si le lien de réinitialisation du mot de passe a été envoyé avec succès, nous redirigerons
        // l'utilisateur vers la page précédente avec un message de statut approprié.
        // Sinon, nous redirigerons l'utilisateur vers la page précédente avec l'adresse e-mail saisie
        // et un message d'erreur.
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status)) // Redirection avec un message de succès
            : back()->withInput($request->only('email')) // Redirection avec les données saisies par l'utilisateur
                    ->withErrors(['email' => __($status)]); // Affichage du message d'erreur

            }
}
