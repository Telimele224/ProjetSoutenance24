<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PatientRequest;
use App\Http\Requests\admin\updateRequest;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'patient');

        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('prenom', 'like', '%' . $request->search . '%')
                  ->orWhere('telephone', 'like', '%' . $request->search . '%'); // Recherche par numéro de téléphone
            });
        }

        $users = $query->paginate(10);

        return view('admin.patient.index', compact('users'));
    }

    public function create()
    {

        $patient = null; // Initialisez $patient à null pour l'ajout

        return view('admin.patient.form', [
            'title' => 'Ajouter un Patient',
            'action' => route('admin.patient.store'),
            'method' => 'post',
            'patient' => $patient,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(PatientRequest $request)
    {



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
            'user_id' => $user->id,
        ]);

        // event(new Registered($user));
        // event(new Registered($patient));
        return redirect()->route('admin.patient.index')->with('success', 'patient ajouté avec succès.');
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
    public function edit( $id)
    {
        $patient = Patient::findOrFail($id);

        return view('admin.patient.accountactive', [
            'title' => 'Modifier un Patient',
            'action' => route('admin.patient.update', ['patient' => $id]),
            'method' => 'put',
            'patient' => $patient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
        // Autres méthodes du contrôleur

        public function update(Request $request, $id)
        {

            // Trouver le patient à mettre à jour
            $patient = Patient::findOrFail($id);

            $statut = $request->has('statut');
            // Mettre à jour l'utilisateur associé au patient
            $user = $patient->user;

            $user->statut = $statut;
            // dd($user);

           $user->save();

            // Redirection avec un message de succès
            return redirect()->route('admin.patient.index')->with('success', 'Patient mis à jour avec succès.');
        }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
