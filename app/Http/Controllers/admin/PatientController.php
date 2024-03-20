<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PatientRequest;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $patients = new Patient();
        return view ('admin.patient.index',[
            'users' => User::orderBy('created_at', 'desc')->paginate(10),
            'patients'=> $patients
        ]);
    }

    public function create()
    {

        $patient = null; // Initialisez $medecin à null pour l'ajout

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
            'role' => $request->filled('role') ? $request->input('role') : 'patient',
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $avatarPath,

        ]);
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
