<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dompdf\Dompdf;

class AdminPdf extends Controller
{
    public function generatePDF()
    {
        $users = User::all();

        $html = view('admin.usersPdf.pdf', compact('users'))->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html);

        // Rendu du PDF
        $pdf->render();

        // Retourne le PDF pour téléchargement
        return $pdf->stream('document.pdf');
    }
}
