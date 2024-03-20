<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\TypeConsultation;
use Illuminate\Http\Request;

class DossierMedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $patient_id = auth()->user()->patient->id; // Supposons que l'utilisateur actuel est un médecin

        // Récupérer les consultations associées au médecin
        $consultations = Consultation::where('patient_id', $patient_id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Récupérer la liste des patients avec leurs informations utilisateur associées
        $medecins = Medecin::with('user')->get();

        return view ('patients.Dossier_medical.index', [
            'consultations' => $consultations,
            'medecins' => $medecins,
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
    public function show(Consultation $consultation)
    {

        return view('patients.Dossier_medical.show',[
            'consultation' => $consultation,
            'patients' => Patient::all(),
            'medecins' => Medecin::all(),
            'typesConsultations' => TypeConsultation::all(),
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
    public function generatePDF1($id)
    {
    // Récupérer la consultation à partir de l'identifiant
    $consultation = Consultation::findOrFail($id);

    // Configuration de Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    // Création de l'instance de Dompdf
    $dompdf = new Dompdf($options);

    // Charger la vue pour le PDF avec les données de la consultation
    $html = view('patients.Dossier_medical.pdf',[
            'consultations' => $consultation,
            'patients' => Patient::all(),
            'medecins' => Medecin::all(),
            'typesConsultations' => TypeConsultation::all(),

    ])->render();

    // Charger le HTML dans Dompdf
    $dompdf->loadHtml($html);

    // Rendu du PDF
    $dompdf->render();

    // Récupérer le contenu PDF généré
    $pdfContent = $dompdf->output();

    // Nom du fichier PDF à enregistrer
    $filename = 'consultation_'.$id.'.pdf';

    // Chemin du répertoire de stockage
    $storagePath = storage_path('app/pdf');
    // Enregistrer le PDF dans le répertoire de stockage
    Storage::put('pdf/'.$filename, $pdfContent);

    $pdfPath = $storagePath.'/'.$filename;

    $pdfPath =Str::replace('\\','/',$pdfPath);

    // Retourner une réponse avec le chemin du fichier PDF téléchargé
    return response()->json(['path' => $pdfPath]);
}

}
