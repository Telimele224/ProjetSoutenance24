<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Rdv;
use Illuminate\Http\Request;

class PatientConsultationController extends Controller
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
    public function show(Consultation $consultation)
    {
        // Récupérer le rendez-vous associé à la consultation
        $rdv = $consultation->rdv;
    
        // Récupérer l'utilisateur (médecin) associé au rendez-vous
        $medecin = $rdv->medecin->user;
    
        // Passer les informations à la vue
        return view('patients.consultation_patient.show', [
            'rdv' => $rdv,
            'consultation' => $consultation,
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
