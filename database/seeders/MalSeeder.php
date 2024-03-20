<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Illness;

class MalSeeder extends Seeder
{
    public function run()
    {
        Illness::create(['nom' => 'Maux1']);
        Illness::create(['nom' => 'Maux2']);
        // Ajoutez d'autres maux au besoin
    }
}
