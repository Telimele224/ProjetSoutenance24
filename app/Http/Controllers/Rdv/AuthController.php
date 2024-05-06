<?php

namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use App\Http\Requests\admin\PatientRequest ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeEmail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
// use App\Models\VerificationCodeEmail;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function nouveauPatient(PatientRequest $request) :RedirectResponse
    {
        $request->validate($request->rules());
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
                    // 'photo' => null, // Initialisez la valeur du champ photo à null par défaut
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
                    'telephone' => $request->input('telephone'),
                    'user_id' => $user->id, // Association du patient à l'utilisateur créé
                ]);

                //   // Envoi de l'e-mail de vérification
                //   event(new Registered($user));

                // Connexion de l'utilisateur nouvellement enregistré
                Auth::login($user);

                return redirect()->route('confirmation_rdv_view');; // Redi rection vers la page d'accuel
    }

    // public function verifyCodeView()
    // {
    //     // Récupérer les données d'inscription de la session pour les afficher dans la vue
    //     $registrationData = session()->get('registration_data');
    //     return view('rdv.verification_code', compact('registrationData'));
    // }

    // public function verifyCode(Request $request)
    // {
    //     $request->validate([
    //         'verification_code' => 'required',
    //     ]);

    //     $verificationCode = session()->get('verification_code');

    //     // Vérification si le code entré par l'utilisateur est correct
    //     if ($request->input('verification_code') == $verificationCode) {
    //         // Récupérer les données d'inscription de la session
    //         $registrationData = session()->get('registration_data');

    //         // Créer l'utilisateur

    //         $avatarPath = $this->uploadAvatar($request->file('avatar'));

    //         $user = User::create([
    //             'name' => $registrationData['name'],
    //             'nom' => $registrationData['nom'],
    //             'prenom' => $registrationData['prenom'],
    //             'adresse' => $registrationData['adresse'],
    //             'genre' => $registrationData['genre'],
    //             'age' => $registrationData['age'],
    //             'telephone' => $registrationData['telephone'],
    //             'email' => $registrationData['email'],
    //             'role' => $registrationData['role'],
    //             'avatar' => $avatarPath, // Utiliser le chemin de l'avatar téléchargé
    //             'password' => Hash::make($registrationData['password']),
    //         ]);

    //         // Créer le patient lié à l'utilisateur
    //         Patient::create([
    //             'ville' => $registrationData['ville'],
    //             'user_id' => $user->id,
    //         ]);

    //         // Redirection vers la page de connexion
    //         return redirect()->route('patients.login_patient_view')->with('success', 'Patient ajouté avec succès.');;
    //     } else {
    //         // Code incorrect, afficher un message d'erreur
    //         return back()->with('error', 'Le code de validation est incorrect. Veuillez réessayer.');
    //     }
    // }


    // function uploadAvatar($file)
    // {
    //     if ($file) {
    //         $filename = uniqid() . '_' . $file->getClientOriginalName();
    //         $path = public_path('avatars');

    //         if (!file_exists($path)) {
    //             mkdir($path, 0777, true);
    //         }

    //         $file->move($path, $filename);

    //         return $filename;
    //     }

    //     return null;
    // }



    // protected function generateVerificationCode()
    // {
    //     // Générer un code de validation aléatoire
    //     return mt_rand(100000, 999999);
    // }

    public function login_patient_view(){
        return view("rdv.loginPatient");
    }


    public function Login_patient(Request $request)
    {
        // Valider les données du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative d'authentification de l'utilisateur
        if (Auth::attempt($credentials)) {
            return redirect()->route('confirmation_rdv_view');
        } else {
            // Authentification échouée, rediriger l'utilisateur avec un message d'erreur
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
        }
    }

    public function login_medecin_view(){
        return view("rdv.loginMedecin");
    }

    public function Login_medecin(Request $request)
    {
        // Valider les données du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative d'authentification de l'utilisateur
        if (Auth::attempt($credentials)) {
            return redirect()->route('medecins.dashboard_medecin');
        } else {
            // Authentification échouée, rediriger l'utilisateur avec un message d'erreur
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
        }
    }




    public function dashboard_patient_view(){
        return view("patients.home");
    }

    public function dashboard_medecin_view(){
        return view("medecins.home");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
