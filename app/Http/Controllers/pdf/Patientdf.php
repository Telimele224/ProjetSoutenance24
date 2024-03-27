<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Dompdf\Dompdf;

class Patientdf extends Controller
{
    public function patient()
    {
        $users = User::with('patient')->get();

        $html = view('admin.usersPdf.patient', compact('users'))->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html);

        // Rendu du PDF
        $pdf->render();

        // Retourne le PDF pour téléchargement
        return $pdf->stream('listepatients.pdf');
    }
}
