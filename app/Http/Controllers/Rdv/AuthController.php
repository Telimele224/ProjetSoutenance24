<?php

namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use App\Http\Requests\admin\PatientRequest ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeEmail;
// use App\Models\VerificationCodeEmail;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function nouveauPatient(PatientRequest $request)
    {
        $request->validate($request->rules());

        // Génération et envoi du code de validation par e-mail
        $verificationCode = $this->generateVerificationCode();
        Mail::to($request->input('email'))->send(new VerificationCodeEmail($verificationCode));

        // Stocker uniquement les données nécessaires à la vérification du code dans la session
        session()->put('registration_data', [
            'name' => $request->input('name'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'genre' => $request->input('genre'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'ville' => $request->input('ville'),
            'role' => $request->filled('role') ? $request->input('role') : 'patient',
            'password' => $request->input('password'),
        ]);
        session()->put('verification_code', $verificationCode);

        // Redirection vers la vue où l'utilisateur saisira le code
        return redirect()->route('patients.verify_code_view');
    }

    public function verifyCodeView()
    {
        // Récupérer les données d'inscription de la session pour les afficher dans la vue
        $registrationData = session()->get('registration_data');
        return view('rdv.verification_code', compact('registrationData'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required',
        ]);

        $verificationCode = session()->get('verification_code');

        // Vérification si le code entré par l'utilisateur est correct
        if ($request->input('verification_code') == $verificationCode) {
            // Récupérer les données d'inscription de la session
            $registrationData = session()->get('registration_data');

            // Créer l'utilisateur

            $avatarPath = $this->uploadAvatar($request->file('avatar'));

            $user = User::create([
                'name' => $registrationData['name'],
                'nom' => $registrationData['nom'],
                'prenom' => $registrationData['prenom'],
                'adresse' => $registrationData['adresse'],
                'genre' => $registrationData['genre'],
                'age' => $registrationData['age'],
                'telephone' => $registrationData['telephone'],
                'email' => $registrationData['email'],
                'role' => $registrationData['role'],
                'avatar' => $avatarPath, // Utiliser le chemin de l'avatar téléchargé
                'password' => Hash::make($registrationData['password']),
            ]);

            // Créer le patient lié à l'utilisateur
            Patient::create([
                'ville' => $registrationData['ville'],
                'user_id' => $user->id,
            ]);

            // Redirection vers la page de connexion
            return redirect()->route('patients.login_patient_view')->with('success', 'Patient ajouté avec succès.');;
        } else {
            // Code incorrect, afficher un message d'erreur
            return back()->with('error', 'Le code de validation est incorrect. Veuillez réessayer.');
        }
    }


    function uploadAvatar($file)
    {
        if ($file) {
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $path = public_path('avatars');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $filename);

            return $filename;
        }

        return null;
    }



    protected function generateVerificationCode()
    {
        // Générer un code de validation aléatoire
        return mt_rand(100000, 999999);
    }

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
