<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Dompdf\Dompdf;


class Personnelpdf extends Controller
{
    public function personnel()
    {
        $personnels = Personnel::all();;

        $html = view('admin.usersPdf.personnel', compact('personnels'))->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html);

        // Rendu du PDF
        $pdf->render();

        // Retourne le PDF pour téléchargement
        return $pdf->stream('listepersonnel.pdf');
    }
}
