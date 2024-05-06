<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Illness;
use App\Models\Symptom;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $migraine = Illness::where('nom', 'Migraine')->first();
        $gastrite = Illness::where('nom', 'Gastrite')->first();
        $fracture_poignet = Illness::where('nom', 'Fracture du poignet')->first();
        $ulcere_peptique = Illness::where('nom', 'Ulcère peptique')->first();
        $tension_lombaire = Illness::where('nom', 'Tension musculaire lombaire')->first();

        $fievre = Symptom::where('nom', 'Fièvre')->first();
        $douleur_abdominale = Symptom::where('nom', 'Douleur abdominale')->first();
        $toux_persistante = Symptom::where('nom', 'Toux persistante')->first();
        $fatigue_extreme = Symptom::where('nom', 'Fatigue extrême')->first();
        $douleur_thoracique = Symptom::where('nom', 'Douleur thoracique')->first();

        // Création des services avec leurs relations
        Service::create([
            'nom' => 'Service de neurologie',
            'description' => 'Service pour les troubles neurologiques.'
        ])->illnesses()->attach([$migraine->id]);

        Service::create([
            'nom' => 'Service de gastro-entérologie',
            'description' => 'Service pour les problèmes gastro-intestinaux.'
        ])->illnesses()->attach([$gastrite->id]);

        Service::create([
            'nom' => 'Service de chirurgie orthopédique',
            'description' => 'Service pour les problèmes orthopédiques.'
        ])->illnesses()->attach([$fracture_poignet->id]);

        Service::create([
            'nom' => 'Service de médecine interne',
            'description' => 'Service pour les maladies internes.'
        ])->illnesses()->attach([$ulcere_peptique->id]);

        Service::create([
            'nom' => 'Service de rhumatologie',
            'description' => 'Service pour les troubles musculosquelettiques.'
        ])->illnesses()->attach([$tension_lombaire->id]);

        Service::create([
            'nom' => 'Service de pédiatrie',
            'description' => 'Service pour les soins aux enfants.'
        ])->symptoms()->attach([$fievre->id, $douleur_abdominale->id]);

        Service::create([
            'nom' => 'Service d\'urgence',
            'description' => 'Service pour les situations d\'urgence médicale.'
        ])->symptoms()->attach([$toux_persistante->id, $fatigue_extreme->id]);

        Service::create([
            'nom' => 'Service de cardiologie',
            'description' => 'Service pour les problèmes cardiaques.'
        ])->symptoms()->attach([$douleur_thoracique->id]);
    }
}

