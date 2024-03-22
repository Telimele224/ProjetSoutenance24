<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdministrateurRequest;
use App\Models\Administrateurs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.administrateur.index',[
            'users' => User::orderBy('created_at', 'desc')->paginate(10)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admininistrateur = null; // Initialisez $medecin à null pour l'ajout

        return view('admin.administrateur.form', [
            'title' => 'Ajouter un admininistrateur',
            'action' => route('admin.administrateur.store'),
            // 'method' => 'post',
            'administrateur' => $admininistrateur,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdministrateurRequest $request)
    {

        // dd($request->all());
        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->input('name'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'genre' => $request->input('genre'),
            'adresse' => $request->input('adresse'),
            'age' => $request->input('age'),
            'role' => $request->filled('role') ? $request->input('role') : 'admin',
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'photo' => null, // Initialisez la valeur du champ photo à null par défaut
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
    $admininistrateur = Administrateurs::create([
        'user_id' => $user->id,
    ]);

        // event(new Registered($user));
        // event(new Registered($patient));
        return redirect()->route('admin.administrateur.index')->with('success', 'patient ajouté avec succès.');
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
