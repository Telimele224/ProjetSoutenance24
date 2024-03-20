<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disease;

class MaladieSeeder extends Seeder
{
    public function run()
    {
        Disease::create(['nom' => 'Maladie1']);
        Disease::create(['nom' => 'Maladie2']);
      
    }
}
