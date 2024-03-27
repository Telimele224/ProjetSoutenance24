<?php

namespace App\Http\Controllers\impression;

use App\Exports\patientliste;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class PatientImpression extends Controller
{
    public function patient()
    {
        return Excel::download(new patientliste, 'listepatients.xlsx');
    }
}
