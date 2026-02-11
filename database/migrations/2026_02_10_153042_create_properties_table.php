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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price');
            $table->string('location');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area');
            $table->text('image');
            $table->string('energy_certification');
            $table->json('energy_type');
            $table->json('materials');
            $table->integer('co2_emissions');
            $table->integer('co2_savings');
            $table->text('description');
            $table->json('features');
            $table->json('sustainability_checklist');
            $table->json('certifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
