<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        // Kriteria Hotel
        $kriteriaHotel = [
            ['nama' => 'Harga', 'jenis' => 'cost', 'bobot' => 0.25, 'tipe' => 'hotel'],
            ['nama' => 'Fasilitas', 'jenis' => 'benefit', 'bobot' => 0.20, 'tipe' => 'hotel'],
            ['nama' => 'Jarak ke Pusat Kota', 'jenis' => 'cost', 'bobot' => 0.15, 'tipe' => 'hotel'],
            ['nama' => 'Pelayanan', 'jenis' => 'benefit', 'bobot' => 0.20, 'tipe' => 'hotel'],
            ['nama' => 'Kebersihan', 'jenis' => 'benefit', 'bobot' => 0.20, 'tipe' => 'hotel'],
        ];

        foreach ($kriteriaHotel as $k) {
            DB::table('kriteria')->insert(array_merge($k, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Kriteria Wisata
        $kriteriaWisata = [
            ['nama' => 'Harga Paket', 'jenis' => 'cost', 'bobot' => 0.25, 'tipe' => 'wisata'],
            ['nama' => 'Fasilitas', 'jenis' => 'benefit', 'bobot' => 0.20, 'tipe' => 'wisata'],
            ['nama' => 'Durasi Perjalanan', 'jenis' => 'benefit', 'bobot' => 0.15, 'tipe' => 'wisata'],
            ['nama' => 'Tempat Populer', 'jenis' => 'benefit', 'bobot' => 0.20, 'tipe' => 'wisata'],
            ['nama' => 'Keamanan', 'jenis' => 'benefit', 'bobot' => 0.20, 'tipe' => 'wisata'],
        ];

        foreach ($kriteriaWisata as $k) {
            DB::table('kriteria')->insert(array_merge($k, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
