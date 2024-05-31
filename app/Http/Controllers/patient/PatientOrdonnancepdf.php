<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Ordonance;
use Illuminate\Http\Request;

class PatientOrdonnancepdf extends Controller
{
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
    public function show($consultationId)
    {
        // Récupérer toutes les ordonnances de la consultation associée
        $ordonances = Ordonance::where('consultation_id', $consultationId)->get();

        // Récupérer les informations du patient associé à la consultation
        $patient = $ordonances->first()->consultation->rdv->patient->user;

        // Récupérer les informations du médecin associé à la consultation
        $medecin = $ordonances->first()->consultation->rdv->medecin->user;

        // Passer les données à la vue
        return view('medecins.medecinpdf.show', [
            'ordonances' => $ordonances,
            'patient' => $patient, 
            'medecin' => $medecin,
        ]);
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
