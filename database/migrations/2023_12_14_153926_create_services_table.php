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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->string('nom');
            $table->string('description');
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
        //  // Ajouter la clé étrangère vers la table pivot service_symptom_illness_disease
        //  Schema::table('service_symptom_illness_disease', function (Blueprint $table) {
        //     $table->foreign('service_id')->references('service_id')->on('services')->onDelete('cascade');
        // });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
