<?php

namespace App\Http\Controllers\medecin\medecinPdf;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Ordonance;
use Dompdf\Dompdf;

class MedecinPdfController  extends Controller
{
    public function generatemedecinpdf()
    {
        // Récupérer toutes les ordonnances de la consultation associée
        $ordonances = Ordonance::all();

        // Récupérer les informations du patient associé à la consultation
        $patient = $ordonances->first()->consultation->rdv->patient->user;

        // Récupérer les informations du médecin associé à la consultation
        $medecin = $ordonances->first()->consultation->rdv->medecin->user;

        // Générez le HTML de la vue
        $html = view('medecins.medecinpdf.pdf', compact('patient', 'medecin', 'ordonances'))->render();

        // Instanciation de Dompdf
        $pdf = new Dompdf();

        // Charger le HTML
        $pdf->loadHtml($html);

        // (Optionnel) Configurer la taille et l'orientation de la page
        $pdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $pdf->render();

        // Retourne le PDF pour téléchargement
        return $pdf->stream('document.pdf');
    }
}
