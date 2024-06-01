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
        $ordonance = new Ordonance();

        // Passer les informations à la vue
        return view('medecins.ordonance.form', [
            'consultation' => $consultation,
            'ordonance' => $ordonance,
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
    
        if (isset($data['ordonnances'])) {
            foreach ($data['ordonnances'] as $ordonanceData) {
                Ordonance::create([
                    'consultation_id' => $data['consultation_id'],
                    'name' => $ordonanceData['name'],
                    'posologie' => $ordonanceData['posologie'],
                    'mode_utilisation' => $ordonanceData['mode_utilisation'],
                ]);
            }
        }
    
        return redirect()->route('medecins.ordonance.index')->with('success', 'Ajout effectué avec succès !');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Ordonance $ordonance)
    {
        // Récupérer toutes les ordonnances de la consultation associée
        $consultationId = $ordonance->consultation_id;
        $ordonances = Ordonance::where('consultation_id', $consultationId)->get();

        // Récupérer les informations du patient associé à l'ordonnance
        $patient = $ordonance->consultation->rdv->patient->user;

        // Passer les données à la vue
        return view('medecins.ordonance.show', [
            'ordonances' => $ordonances,
            'patient' => $patient,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($consultationId)
{
    $consultation = Consultation::findOrFail($consultationId);
    $rdv = $consultation->rdv;
    $patient = $rdv->patient->user;
    $ordonances = Ordonance::where('consultation_id', $consultationId)->get();

    return view('medecins.ordonance.edit', [
        'consultation' => $consultation,
        'rdv' => $rdv,
        'patient' => $patient,
        'ordonances' => $ordonances,
    ]);
}


public function update(OrdonnanceRequest $request, $consultationId)
{
    $data = $request->validated();

    Ordonance::where('consultation_id', $consultationId)->delete();

    if (isset($data['ordonnances'])) {
        foreach ($data['ordonnances'] as $ordonanceData) {
            Ordonance::create([
                'consultation_id' => $consultationId,
                'name' => $ordonanceData['name'],
                'posologie' => $ordonanceData['posologie'],
                'mode_utilisation' => $ordonanceData['mode_utilisation'],
            ]);
        }
    }

    return redirect()->route('medecins.ordonance.index')->with('success', 'Modification effectuée avec succès !');
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
