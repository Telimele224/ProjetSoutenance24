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
    // Traitement du numéro de téléphone pour gérer le préfixe du code de pays
    $telephone = $request->input('telephone');

    if (!str_starts_with($telephone, '+224') && !str_starts_with($telephone, '224') && !str_starts_with($telephone, '00224')) {
        $telephone = '+224' . $telephone;
    } else {
        // Normaliser le numéro de téléphone pour qu'il commence par +224
        if (str_starts_with($telephone, '224')) {
            $telephone = '+224' . substr($telephone, 3);
        } elseif (str_starts_with($telephone, '00224')) {
            $telephone = '+224' . substr($telephone, 5);
        }
    }

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->input('name'),
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'genre' => $request->input('genre'),
        'adresse' => $request->input('adresse'),
        'age' => $request->input('age'),
        'role' => $request->filled('role') ? $request->input('role') : 'patient',
        'telephone' => $telephone,
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    // Télécharge l'avatar de l'utilisateur s'il est fourni dans la requête
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        if ($photo->isValid()) {
            $new_photo = $photo->getClientOriginalName();
            $path = $photo->storeAs('photos', $new_photo, 'public'); // Enregistrez la photo dans le stockage public
            $user->photo = $path; // Mettez à jour le champ photo avec le chemin d'accès de la photo
            $user->save(); // Enregistrez les modifications
        }
    }

    // Création du patient lié à l'utilisateur
    $patient = Patient::create([
        'ville' => $request->input('ville'),
        'poids' => $request->input('poids'),
        'telephone' => $telephone,
        'user_id' => $user->id, // Association du patient à l'utilisateur créé
    ]);

    // Connexion de l'utilisateur nouvellement enregistré
    Auth::login($user);

        return redirect(RouteServiceProvider::HOME); // Redirection vers la page d'accueil
    }

}

