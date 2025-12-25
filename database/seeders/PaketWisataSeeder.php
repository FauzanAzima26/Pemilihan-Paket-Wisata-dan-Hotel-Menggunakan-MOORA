<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaketWisata;
use Illuminate\Support\Facades\DB;

class PaketWisataSeeder extends Seeder
{
    public function run(): void
    {
        $wisatas = [
            ['nama' => 'Bali Trip', 'c1' => 1000000, 'c2' => 9, 'c3' => 10, 'c4' => 5, 'c5' => 8],
            ['nama' => 'Lombok Adventure', 'c1' => 850000, 'c2' => 8, 'c3' => 12, 'c4' => 4, 'c5' => 7],
            ['nama' => 'Yogyakarta Tour', 'c1' => 700000, 'c2' => 7, 'c3' => 14, 'c4' => 3, 'c5' => 6],
        ];

        foreach ($wisatas as $w) {
            $paket = PaketWisata::create($w);

            // Tambah ke alternatif
            $altId = DB::table('alternatif')->insertGetId([
                'nama' => $w['nama'],
                'tipe' => 'wisata',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Tambah ke penilaian per kriteria wisata
            for ($i = 1; $i <= 5; $i++) {
                DB::table('penilaian')->insert([
                    'alternatif_id' => $altId,
                    'kriteria_id' => $i, // pastikan id kriteria wisata 1..5
                    'nilai' => $w['c'.$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
