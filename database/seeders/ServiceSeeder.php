<?php

namespace Database\Seeders;

use App\Models\Disease;
use App\Models\Illness;
use App\Models\Symptom;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ajouter les services

        // Service::create(['nom' => 'cardiologie', 'description' => 'le service de cardio',]);
        // Service::create(['nom' => 'pediatrie', 'description' => 'le service de pediatrie',]);
        // Service::create(['nom' => 'chirurgie', 'description' => 'le service de chirurgie',]);

// Modifiez la partie du seeder ServiceSeeder comme suit :
    $mal1 = Illness::where('nom', 'Maux1')->first();
    $mal2 = Illness::where('nom', 'Maux2')->first();
    $symptome1 = Symptom::where('nom', 'Symptome1')->first();
    $symptome2 = Symptom::where('nom', 'Symptome2')->first();
    $maladie1 = Disease::where('nom', 'Maladie1')->first();
    $maladie2 = Disease::where('nom', 'Maladie2')->first();
    
    Service::create([
        'nom' => 'Service1',
        'description' => 'Description du service 1'
    ])->symptoms()->attach([$symptome1->id]);
    
    Service::create([
        'nom' => 'Service2',
        'description' => 'Description du service 2' 
    ])->symptoms()->attach([$symptome2->id]);
    
    Service::create([
        'nom' => 'Service3',
        'description' => 'Description du service 3'
    ])->illnesses()->attach([$mal1->id]);
    
    Service::create([
        'nom' => 'Service4',
        'description' => 'Description du service 4'
    ])->illnesses()->attach([$mal2->id]);

    Service::create([
        'nom' => 'Service5',
        'description' => 'Description du service 5'
    ])->diseases()->attach([$maladie1->id]);

    Service::create([
        'nom' => 'Service6',
        'description' => 'Description du service 6'
    ])->diseases()->attach([$maladie2->id]);
    

    }
}
