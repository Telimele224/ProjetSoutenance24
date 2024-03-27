<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Rdv;
use App\Models\TypeConsultation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->string('resultat');
            $table->string('examen_complementaire')->nullable();
            $table->string('suivi_recommande')->nullable();
            $table->string('note_medecin')->nullable();
            $table->string('status')->nullable();
            $table->string('frais');
            $table->foreignIdFor(Rdv::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(TypeConsultation::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
