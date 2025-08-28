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
        Schema::create('crop_photos', function (Blueprint $table) {
            $table->id();
             $table->foreignId('crop_id')->constrained('crops')->cascadeOnDelete();
            $table->string('photo_url');
            $table->json('alt')->nullable(); // {"en":"...","hi":"..."}
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_photos');
    }
};
