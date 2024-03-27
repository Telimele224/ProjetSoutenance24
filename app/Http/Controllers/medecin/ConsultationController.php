<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\medecin\ConsultationRequest;
use App\Models\Consultation;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\TypeConsultation;
use illuminate\Support\Str;
use App\Models\Patient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Récupérer le terme de recherche du formulaire
         $search = $request->input('search');

        // Rechercher les consultations en fonction du numéro de téléphone (patient_id) ou du code
        $consultations = Consultation::whereHas('patient', function ($query) use ($search) {
            $query->where('telephone', 'like', '%' . $search . '%');
        })->orWhere('code', 'like', '%' . $search . '%')->get();

        // Retourner la vue avec les consultations filtrées
        return view('medecins.consultation.index', compact('consultations'));

            // Récupérer l'ID du médecin actuellement connecté
        $medecin_id = auth()->user()->medecin->id; // Supposons que l'utilisateur actuel est un médecin

        // Récupérer les consultations associées au médecin
        $consultations = Consultation::where('medecin_id', $medecin_id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // Récupérer la liste des patients avec leurs informations utilisateur associées
        $patients = Patient::with('user')->get();

        return view ('medecins.consultation.index', [
            'consultations' => $consultations,
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $consultation = new Consultation();
        return view ('medecins.consultation.form' ,[
            'consultation' => $consultation,
            'patients' => Patient::all(),
            'medecins' => Medecin::all(),
            'typesConsultations' => TypeConsultation::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultationRequest $request)
    {
        $user = auth()->user();
        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'medecin') {
            // Récupérer l'ID du médecin connecté
            $medecin_id = $user->medecin->id;

            // Valider les données du formulaire
            $data = $request->validated();

            // Ajouter l'ID du médecin aux données à enregistrer
            $data['medecin_id'] = $medecin_id;

            // Créer la consultation avec les données fournies
            Consultation::create($data);
            $message ="Ajout effectué avec succès.";
            // Rediriger avec un message de succès si la consultation a été créée avec succès
            return redirect()->route('medecins.consultation.index')->with('success',$message );
        } else {
            // Rediriger avec un message d'erreur si l'utilisateur n'a pas le rôle de médecin
            return redirect()->route('login')->with('error', 'Vous devez être connecté en tant que médecin pour créer une consultation.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {

        return view('medecins.consultation.show',[
            'consultation' => $consultation,
            'patients' => Patient::all(),
            'medecins' => Medecin::all(),
            'typesConsultations' => TypeConsultation::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        return view ('medecins.consultation.form',[
            'consultation' => $consultation,
            'patients' => Patient::all(),
            'medecins' => Medecin::all(),
            'typesConsultations' => TypeConsultation::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationRequest $request, Consultation $consultation)
    {
        $user = auth()->user();

        // Vérifier le rôle de l'utilisateur
        if ($user->role === 'medecin') {
            // Récupérer l'ID du médecin connecté
            $medecin_id = $user->medecin->id;

            // Vérifier si le médecin connecté est bien le propriétaire de la consultation à mettre à jour
            if ($consultation->medecin_id == $medecin_id) {
                // Valider les données du formulaire
                $data = $request->validated();

        //         $pdfFileName = $request->file('pdf_file')->getClientOriginalName(); // Nom du fichier PDF

        //         $request->file('pdf_file')->storeAs('public/pdf', $pdfFileName); // Stockage du fichier dans le dossier public/pdf

        //         // Mettre à jour la consultation avec les données fournies
        //         $consultation->update($data);

        //           // Génération du contenu HTML à partir de la vue PDF template
        // $htmlContent = view('consultations.pdf_template', compact('consultations'))->render();

        // // Configuration de dompdf
        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);

        // // Création de l'instance de dompdf
        // $dompdf = new Dompdf($options);

        // // Chargement du contenu HTML
        // $dompdf->loadHtml($htmlContent);

        // // Rendu du PDF
        // $dompdf->render();

        // // Stockage du fichier PDF dans le dossier public/pdf
        // $pdfFileName = 'consultations.pdf';
        // Storage::disk('public')->put('pdf/' . $pdfFileName, $dompdf->output());

                // Rediriger avec un message de succès si la consultation a été mise à jour avec succès
                return redirect()->route('medecins.consultation.index')->with('success', 'Mise à jour effectuée avec succès.');
            } else {
                // Rediriger avec un message d'erreur si le médecin connecté n'est pas autorisé à mettre à jour cette consultation
                return redirect()->route('medecins.consultation.index')->with('error', 'Vous n\'êtes pas autorisé à mettre à jour cette consultation.');
            }
        } else {
            // Rediriger avec un message d'erreur si l'utilisateur n'a pas le rôle de médecin
            return redirect()->route('login')->with('error', 'Vous devez être connecté en tant que médecin pour mettre à jour une consultation.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Retrieve phone numbers of patients.
     */
    public function retrievePatientPhoneNumbers()
    {
        $phoneNumbers = DB::table('users')
            ->join('patients', 'users.user_id', '=', 'patients.user_id')
            ->select('users.telephone')
            ->distinct()
            ->get();

        return response()->json($phoneNumbers);
    }

     public function generatePDF($id)
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
    $html = view('medecins.consultation.pdf',[
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
