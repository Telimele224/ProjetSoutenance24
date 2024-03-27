<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Dompdf\Dompdf;

class MedecinPdf extends Controller
{
    public function medecin()
    {
        $users = User::with('medecin')->get();

        $html = view('admin.usersPdf.medecin', compact('users'))->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html);

        // Rendu du PDF
        $pdf->render();

        // Retourne le PDF pour téléchargement
        return $pdf->stream('listeMedecins.pdf');
    }
}
