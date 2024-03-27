<?php

namespace App\Http\Controllers\impression;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class AdminImpression extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'listes.xlsx');
    }
}
