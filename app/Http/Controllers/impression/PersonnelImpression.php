<?php

namespace App\Http\Controllers\impression;

use App\Exports\personnelliste;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class PersonnelImpression extends Controller
{
    public function personnel()
    {
        return Excel::download(new PersonnelListe, 'personnel.xlsx');
    }
}
