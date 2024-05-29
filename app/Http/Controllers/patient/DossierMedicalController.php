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
        // Vérifier si l'utilisateur est un patient
        if (auth()->user()->role === 'patient') {
            // Récupérer l'ID du patient
            $patient_id = auth()->user()->patient->id;

            // Récupérer toutes les consultations associées au patient avec leurs ordonnances
            $consultations = Consultation::whereHas('rdv.patient', function($query) use ($patient_id) {
                $query->where('id', $patient_id);
            })
            ->with('ordonnances') // Charger les ordonnances associées à chaque consultation
            ->orderBy('created_at', 'desc')
            ->get(); // Utilisez get() pour obtenir une collection de résultats

            // Passer les données à la vue
            return view('patients.Dossier_medical.index', [
                'consultations' => $consultations,
            ]);
        }

        return redirect()->back()->with('error', 'Accès non autorisé');
    }

    public function show(Consultation $consultation)
    {
        if (auth()->user()->role === 'patient') {
            $patient_id = auth()->user()->patient->id;

            $consultation = Consultation::whereHas('rdv.patient', function($query) use ($patient_id) {
                    $query->where('id', $patient_id);
                })
                ->with(['ordonnances', 'typeConsultation', 'rdv.medecin.user'])
                ->findOrFail($consultation->id);

            return view('patients.Dossier_medical.show', [
                'consultation' => $consultation,
            ]);
        }

        return redirect()->back()->with('error', 'Accès non autorisé');
    }










}
