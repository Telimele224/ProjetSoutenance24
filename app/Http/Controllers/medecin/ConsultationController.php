<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\medecin\ConsultationRequest;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Rdv;
use App\Models\TypeConsultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('medecins.consultation.index', [
            'consultations' => Consultation::all(),
            'rdvs' => Rdv::all(),
            'patients' => Patient::all(),
            'typesConsultations' => TypeConsultation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consultation = new Consultation();
        return view('medecins.consultation.form', [
            'consultation' => $consultation,
            'rdvs' => Rdv::all(),
            'typesConsultations' => TypeConsultation::all(),

        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultationRequest $request)
    {
        $data = $request->validated();
        Consultation::create($data);
        return redirect()->route('medecins.consultation.index')->with('success', 'Ajout effectue avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        return view('medecins.consultation.form', [
            'consultation' => $consultation,
            'rdvs' => Rdv::all(),
            'typesConsultations' => TypeConsultation::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationRequest $request, Consultation $consultation)
    {
        $data = $request->validated();
        $consultation->update($data);
        return redirect()->route('medecins.consultation.index')->with('success', 'Modification effectue avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
