<?php

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
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient')->nullable();
            $table->unsignedBigInteger('id_medecin');
            $table->date('dateRdv');
            $table->time('heure');
            $table->string('jour')->nullable();
            $table->text('raison_annulation')->nullable();
            $table->boolean('is_deleted')->default(false); // Ajout du champ is_deleted
            $table->string('statut')->default('en attente');
            $table->foreign('id_patient')->references('id')->on('patients')->onUpdate('cascade');
            $table->foreign('id_medecin')->references('id')->on('medecins')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rdvs');
    }
};
