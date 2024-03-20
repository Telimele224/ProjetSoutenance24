<?php

use App\Http\Controllers\admin\TypeConsultationController;
use App\Http\Requests\admin\TypeConsultationRequest;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\TypeConsultaion;
use App\Models\TypeConsultation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('status');
            $table->string('code')->unique();
            $table->string('frais');
            $table->foreignIdFor(Medecin::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnUpdate();
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
