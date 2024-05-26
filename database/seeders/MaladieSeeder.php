<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disease;

class MaladieSeeder extends Seeder
{
    public function run()
    {
         // Maladies
         $maladie1 = Disease::create(['nom' => 'Grippe']);
         $maladie2 = Disease::create(['nom' => 'Diabète de type 2']);
         $maladie3 = Disease::create(['nom' => 'Pneumonie']);
         $maladie4 = Disease::create(['nom' => 'Hypertension artérielle']);
         $maladie5 = Disease::create(['nom' => 'Asthme']);
         $maladie5 = Disease::create(['nom' => 'Migraines']);
         $maladie5 = Disease::create(['nom' => 'Maladie coeliaque']);
         $maladie5 = Disease::create(['nom' => 'Bronchites']);
         $maladie5 = Disease::create(['nom' => 'Gastrite']);

    }
}
