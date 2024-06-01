<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Medecin;
use App\Models\Rdv;
use App\Models\User;
use Illuminate\Http\Request;

class MedecinListeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();
    
        // Vérifier si l'utilisateur est un patient et s'il a un patient associé
        if ($user->role === 'patient' && $user->patient) {
            // Récupérer les rendez-vous du patient avec les détails du médecin
            $rendezVous = Rdv::where('id_patient', $user->patient->id)->with('medecin.user')->get();
    
            // Extraire les médecins des rendez-vous
            $medecins = $rendezVous->map(function ($rdv) {
                return $rdv->medecin->user;
            })->unique('id');
    
            // Passer les médecins à la vue
            return view('patients.medecin.index', ['medecins' => $medecins]);
        } else {
            // L'utilisateur n'est pas un patient ou n'a pas de patient associé
            return redirect()->route('home')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
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
