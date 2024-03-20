<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\MedecinRequest;
use App\Models\Medecin;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\Cast\String_;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.medecin.index',[
            'users'=>User::orderBy('created_at', 'desc')->paginate(10),
            'medecins' => Medecin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $services = Service::all();
        $medecin = null; // Initialisez $medecin à null pour l'ajout

        return view('admin.medecin.form', [
            'title' => 'Ajouter un Médecin',
            'action' => route('admin.medecin.store'),
            'method' => 'post',
            'medecin' => $medecin,
            'services' => $services,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedecinRequest $request)
    {

        $avatarPath = $this->uploadAvatar($request->file('avatar'));
        // dd($request->all());
        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->input('name'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'genre' => $request->input('genre'),
            'adresse' => $request->input('adresse'),
            'age' => $request->input('age'),
            'role' => $request->filled('role') ? $request->input('role') : 'medecin',
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $avatarPath,

        ]);

    // Création du patient lié à l'utilisateur
    $medecin = Medecin::create([
        'specialite' => $request->input('specialite'),
        'biographie' => $request->input('biographie'),
        'statut' => $request->input('statut'),
        'service_id' => $request->input('service_id'),
        'user_id' => $user->id,
    ]);

    return redirect()->route('admin.medecin.index')->with('success', 'Medecin ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Récupérer le médecin
        $medecin = Medecin::findOrFail($id);

        // Récupérer les horaires de disponibilité du médecin
        $horaires = $medecin->horaires;

        // Retourner la vue avec les données du médecin
        return view('admin.medecin.afficher_detaille_medecin', compact('medecin', 'horaires'));

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Récupération du patient à mettre à jour
         $medecin = Medecin::findOrFail($id);
        // Validation des données du formulaire

        $avatarPath = $this->uploadAvatar($request->file('avatar'));

        // dd($request->all());
        // Mise à jour des informations du patient
        $medecin->specialite = $request->input('specialite');
        $medecin->biographie = $request->input('biographie');
        $medecin->statut = $request->input('statut');
        $medecin->service_id = $request->input('service_id');

        // ... ajoutez d'autres champs à mettre à jour ...

        // Mise à jour des informations de l'utilisateur lié au MEDECIN (si nécessaire)
        $user = $medecin->user;
        $user->name = $request->input('name');
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->genre = $request->input('genre');
        $user->adresse = $request->input('adresse');
        $user->age = $request->input('age');

        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');
        $user->avatar = $avatarPath ?: $user->avatar;



        // Vérification et mise à jour du mot de passe
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Enregistrement des modifications
        $user->save();
        $medecin->save();

        return redirect()->route('admin.medecin.index')->with('success', 'Medecin mis à jour avec succès.');

    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
}
