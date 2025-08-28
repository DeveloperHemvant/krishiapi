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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable(); // until OTP system comes
            $table->string('aadhaar_no')->nullable()->unique();
            $table->string('preferred_language')->nullable();

            // location
            $table->foreignId('state_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete();
            $table->string('village')->nullable();

            // farm details
            $table->decimal('land_size',8,2)->nullable(); // acres
            $table->string('land_type')->nullable();
            $table->string('water_source')->nullable();
            $table->json('livestock')->nullable(); // chickens, goats, cows
            $table->json('soil_types')->nullable(); // multiple soil types

            // bank info
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();

            // consent
            $table->boolean('consent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
