<?php

use App\Models\Consultation;
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
        Schema::create('ordonances', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('Posologie');
                $table->string('mode_utilisation');
                $table->foreignIdFor(Consultation::class)->constrained()->cascadeOnUpdate();
                $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonances');
    }
};
