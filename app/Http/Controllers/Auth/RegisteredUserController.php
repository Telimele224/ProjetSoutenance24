<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PatientRequest;
use App\Models\Patient;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
   /**
 * Affiche la vue d'inscription.
 */
public function create(): View
{
    $patient = null; // Initialise la variable $patient à null pour l'ajout

    return view('auth.register', [
        'patient' => $patient, // Passe la variable $patient à la vue
    ]);
}

/**
 * Gère une demande d'inscription entrante.
 *
 * @throws \Illuminate\Validation\ValidationException
 */
public function store(PatientRequest $request): RedirectResponse
{
    // Télécharge l'avatar de l'utilisateur s'il est fourni dans la requête
    $avatarPath = $this->uploadAvatar($request->file('avatar'));

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->input('name'),
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'genre' => $request->input('genre'),
        'adresse' => $request->input('adresse'),
        'age' => $request->input('age'),
        'role' => $request->filled('role') ? $request->input('role') : 'patient',
        'telephone' => $request->input('telephone'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'avatar' => $avatarPath, // Chemin vers l'avatar téléchargé
    ]);

    // Création du patient lié à l'utilisateur
    $patient = Patient::create([
        'ville' => $request->input('ville'),
        'poids' => $request->input('poids'),
        // 'telephone' => $request->input('telephone'),
        'user_id' => $user->id, // Association du patient à l'utilisateur créé
    ]);

    // Connexion de l'utilisateur nouvellement enregistré
    Auth::login($user);

    return redirect(RouteServiceProvider::HOME); // Redirection vers la page d'accueil
}

/**
 * Télécharge l'avatar de l'utilisateur.
 */
function uploadAvatar($file)
{
    if ($file) {
        // Génère un nom de fichier unique en ajoutant un identifiant unique au nom de fichier d'origine
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $path = public_path('avatars'); // Définit le chemin où l'avatar sera stocké dans le dossier public

        if (!file_exists($path)) {
            // Crée le répertoire s'il n'existe pas
            mkdir($path, 0777, true);
        }

        // Déplace le fichier vers le répertoire d'avatar avec le nom de fichier généré
        $file->move($path, $filename);

        return $filename; // Retourne le nom du fichier d'avatar téléchargé
    }

    return null; // Retourne null si aucun fichier n'est fourni
}


}
