<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Models\Medecin;
use App\Models\User;
use Illuminate\Http\Request;

class ListeMedecinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
           // Récupérer le terme de recherche du formulaire
           $search = $request->input('search');

           // Rechercher les consultations en fonction du numéro de téléphone (patient_id) ou du code
        $medecins = Medecin::whereHas('user', function ($query) use ($search) {
            $query->where('specialite', 'like', '%' . $search . '%');
        })->orWhere('specialite', 'like', '%' . $search . '%')->get();

        // Retourner la vue avec les consultations filtrées
        return view('medecins.monequipe.index', compact('medecins'));

        $medecins = Medecin::all();
        $user = User::all();
        return view ('medecins.monequipe.index', [
            'medecins' => $medecins,
            'user' => $user
        ]);
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
