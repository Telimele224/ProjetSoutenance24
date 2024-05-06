<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Illness;


class MalSeeder extends Seeder
{
    public function run()
    {
        // Maux
        $migraine = Illness::create(['nom' => 'Migraine']);
        $gastrite = Illness::create(['nom' => 'Gastrite']);
        $fracture_poignet = Illness::create(['nom' => 'Fracture du poignet']);
        $ulcere_peptique = Illness::create(['nom' => 'Ulcère peptique']);
        $tension_lombaire = Illness::create(['nom' => 'Tension musculaire lombaire']);
    }
}

