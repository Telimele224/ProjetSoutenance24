<?php

namespace App\Http\Controllers\impression;

use App\Exports\Medecinlistes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MedecinImpression extends Controller
{
    public function medecin()
    {
        return Excel::download(new Medecinlistes, 'listemedecins.xlsx');
    }
}
