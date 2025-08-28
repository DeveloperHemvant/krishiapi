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
        Schema::dropIfExists('crop_soil_types');

        Schema::create('crop_soil_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crop_id')
                ->constrained('crops')
                ->cascadeOnDelete();

            $table->foreignId('soil_type_id')
                ->constrained('soil_types')
                ->cascadeOnDelete();

            $table->timestamps();
            $table->unique(['crop_id', 'soil_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_soil_types');
    }
};
