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
        Schema::create('service_symptom_illness_disease', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('service_id');
        $table->foreign('service_id')->references('service_id')->on('services');
        $table->foreignId('symptom_id')->nullable()->constrained('symptoms')->onDelete('cascade');
        $table->foreignId('illness_id')->nullable()->constrained('illnesses')->onDelete('cascade');
        $table->foreignId('disease_id')->nullable()->constrained('diseases')->onDelete('cascade');
        
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_symptom_illness_disease');
    }
};
