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
        Schema::create('hotel', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('d1', 15, 2); // Harga
            $table->decimal('d2', 5, 2); // Fasilitas
            $table->decimal('d3', 5, 2); // Lokasi
            $table->decimal('d4', 4, 2); // Rating
            $table->decimal('d5', 5, 2); // Pelayanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
