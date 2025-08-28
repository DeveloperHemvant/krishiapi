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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
             $table->foreignId('category_id')->nullable()->constrained('crop_categories')->nullOnDelete();
            $table->json('name');
            $table->json('description')->nullable();
            $table->json('seeding_time')->nullable(); // {"en":"Oct-Nov","hi":"अक्टूबर-नवंबर"}
            $table->json('harvest_time')->nullable();
            $table->string('primary_image')->nullable();
            $table->unsignedSmallInteger('total_days')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
