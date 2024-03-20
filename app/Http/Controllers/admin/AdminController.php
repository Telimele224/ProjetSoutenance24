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
            'role' => $request->filled('role') ? $request->input('role') : 'admin',
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $avatarPath,

        ]);
        // Création du patient lié à l'utilisateur
    $admininistrateur = Administrateurs::create([
        'user_id' => $user->id,
    ]);

        // event(new Registered($user));
        // event(new Registered($patient));
        return redirect()->route('admin.administrateur.index')->with('success', 'patient ajouté avec succès.');
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
