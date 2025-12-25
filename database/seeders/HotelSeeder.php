<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = [
            ['nama' => 'Hotel A', 'd1' => 500000, 'd2' => 8, 'd3' => 12, 'd4' => 4, 'd5' => 9],
            ['nama' => 'Hotel B', 'd1' => 750000, 'd2' => 9, 'd3' => 10, 'd4' => 5, 'd5' => 8],
            ['nama' => 'Hotel C', 'd1' => 600000, 'd2' => 7, 'd3' => 14, 'd4' => 3, 'd5' => 7],
        ];

        foreach ($hotels as $h) {
            $hotel = Hotel::create($h);

            // Tambah ke alternatif
            $altId = DB::table('alternatif')->insertGetId([
                'nama' => $h['nama'],
                'tipe' => 'hotel',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Tambah ke penilaian per kriteria hotel
            for ($i = 1; $i <= 5; $i++) {
                DB::table('penilaian')->insert([
                    'alternatif_id' => $altId,
                    'kriteria_id' => $i, // pastikan id kriteria hotel 1..5
                    'nilai' => $h['d'.$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
