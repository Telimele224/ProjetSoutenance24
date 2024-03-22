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
        Schema::create('horaires', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('id_medecin');
        $table->foreign('id_medecin')->references('id')->on('medecins')->onDelete('cascade');
        $table->time('lundi_debut')->nullable();
        $table->time('lundi_fin')->nullable();
        $table->time('mardi_debut')->nullable();
        $table->time('mardi_fin')->nullable();
        $table->time('mercredi_debut')->nullable();
        $table->time('mercredi_fin')->nullable();
        $table->time('jeudi_debut')->nullable();
        $table->time('jeudi_fin')->nullable();
        $table->time('vendredi_debut')->nullable();
        $table->time('vendredi_fin')->nullable();
        $table->time('samedi_debut')->nullable();
        $table->time('samedi_fin')->nullable();
        $table->time('dimanche_debut')->nullable();
        $table->time('dimanche_fin')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horaires');
    }
};
