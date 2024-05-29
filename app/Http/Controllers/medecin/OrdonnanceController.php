<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\medecin\OrdonnanceRequest;
use App\Models\Consultation;
use App\Models\Ordonance;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordonances = Ordonance::with('consultation.rdv.patient.user')->orderBy('created_at', 'desc')->paginate(10);
        return view('medecins.ordonance.index', compact('ordonances'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($consultation_id)
    {
        // Récupérer la consultation associée
        $consultation = Consultation::findOrFail($consultation_id);

        // Récupérer le rendez-vous associé à la consultation
        $rdv = $consultation->rdv;

        // Récupérer l'utilisateur (patient) associé au rendez-vous
        $patient = $rdv->patient->user;

        // Créer une instance vide d'ordonnance
        $ordonnance = new Ordonance();

        // Passer les informations à la vue
        return view('medecins.ordonance.form', [
            'consultation' => $consultation,
            'ordonnance' => $ordonnance,
            'rdv' => $rdv,
            'patient' => $patient,
        ]);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdonnanceRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        Ordonance::create($data);
        return redirect()->route('medecins.ordonance.index')->with('sucess', 'Ajout effectue avec success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordonance $ordonance)
    {
        // Récupérer toutes les informations du patient associé à l'ordonnance
        $patient = $ordonance->consultation->rdv->patient->user;

        // Passer les données à la vue
        return view('medecins.ordonance.show', [
            'ordonance' => $ordonance,
            'patient' => $patient,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordonance $ordonance)
    {
        // Vérifier si l'ordonnance est associée à une consultation
        if (!$ordonance->consultation) {
            return redirect()->route('medecins.consultation.index')->withErrors('Cette ordonnance n\'est pas associée à une consultation.');
        }

        // Récupérer la consultation associée à l'ordonnance
        $consultation = $ordonance->consultation;

        // Vérifier si la consultation a un rendez-vous associé
        if (!$consultation->rdv) {
            return redirect()->route('medecins.consultation.index')->withErrors('Aucun rendez-vous associé à cette consultation.');
        }

        // Récupérer le rendez-vous associé à la consultation
        $rdv = $consultation->rdv;

        // Vérifier si le rendez-vous a un patient associé
        if (!$rdv->patient) {
            return redirect()->route('medecins.consultation.index')->withErrors('Aucun patient associé à ce rendez-vous.');
        }

        // Récupérer l'utilisateur (patient) associé au rendez-vous
        $patient = $rdv->patient->user;

        // Passer les informations à la vue
        return view('medecins.ordonance.form', [
            'consultation' => $consultation,
            'ordonance' => $ordonance,
            'rdv' => $rdv,
            'patient' => $patient,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(OrdonnanceRequest $request, Ordonance $ordonance)
    {
        $data = $request->validated();
        $ordonance->update($data);
        return redirect()->route('medecins.ordonance.index')->with('sucess', 'Modification effectue avec success !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordonance $ordonance)
    {
        $ordonance->delete();
        return redirect()->route('admin.ordonance.index')->with('sucess', 'suppression effectue avec success !');
    }
}
