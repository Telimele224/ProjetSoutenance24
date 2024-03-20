<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
 * Met à jour le mot de passe de l'utilisateur.
 */
public function update(Request $request): RedirectResponse
{
    // Valide les données de la requête et les associe à un sac nommé 'updatePassword'
    $validated = $request->validateWithBag('updatePassword', [
        'current_password' => ['required', 'current_password'], // Le mot de passe actuel est requis et doit correspondre au mot de passe de l'utilisateur
        'password' => ['required', Password::defaults(), 'confirmed'], // Le nouveau mot de passe est requis, doit respecter les règles de validation définies par défaut et doit être confirmé
    ]);

    // Met à jour le mot de passe de l'utilisateur avec le nouveau mot de passe hashé
    $request->user()->update([
        'password' => Hash::make($validated['password']),
    ]);

    // Redirige l'utilisateur vers la page précédente avec un message de statut indiquant que le profil a été mis à jour
    return back()->with('status', 'profile-updated');
}

}
