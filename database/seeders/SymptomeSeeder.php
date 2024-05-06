<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Symptom;

class SymptomeSeeder extends Seeder
{
    public function run()
    {
         // Symptômes
         $fievre = Symptom::create(['nom' => 'Fièvre']);
         $douleur_abdominale = Symptom::create(['nom' => 'Douleur abdominale']);
         $toux_persistante = Symptom::create(['nom' => 'Toux persistante']);
         $fatigue_extreme = Symptom::create(['nom' => 'Fatigue extrême']);
         $douleur_thoracique = Symptom::create(['nom' => 'Douleur thoracique']);
    }
}

