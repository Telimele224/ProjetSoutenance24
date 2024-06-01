<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Models\Rdv;
use App\Models\User;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();
    
        // Vérifier si l'utilisateur est un médecin et s'il a un médecin associé
        if ($user->role === 'medecin' && $user->medecin) {
            // Récupérer les rendez-vous du médecin avec les détails du patient
            $rendezVous = Rdv::where('id_medecin', $user->medecin->id)->with('patient.user')->get();
    
            // Extraire les patients des rendez-vous
            $patients = $rendezVous->map(function ($rdv) {
                return $rdv->patient->user;
            })->unique('id');
    
            // Passer les patients à la vue
            return view('medecins.patient.index', ['patients' => $patients]);
        } else {
            // L'utilisateur n'est pas un médecin ou n'a pas de médecin associé
            return redirect()->route('home')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medecins.patient.form');
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
