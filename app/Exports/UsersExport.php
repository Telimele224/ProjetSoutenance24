<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return User::all();
    }
}
