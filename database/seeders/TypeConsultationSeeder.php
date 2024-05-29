<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeConsultation;

class TypeConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Création des types de consultations
        TypeConsultation::create([
            'name' => 'Consultation régulière',
        ]);

        TypeConsultation::create([
            'name' => 'Consultation de suivi',
        ]);

        TypeConsultation::create([
            'name' => 'Consultation d\'urgence',
        ]);
    }

}
