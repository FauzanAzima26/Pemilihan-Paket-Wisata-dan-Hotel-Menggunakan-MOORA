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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('c1', 15, 2); // Harga
            $table->decimal('c2', 5, 2); // Fasilitas
            $table->decimal('c3', 5, 2); // Durasi
            $table->decimal('c4', 5, 2); // Rating
            $table->decimal('c5', 5, 2); // Akses
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
