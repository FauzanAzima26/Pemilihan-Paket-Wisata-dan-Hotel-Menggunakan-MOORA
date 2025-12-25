<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\BobotKriteria;
use App\Models\Penilaian;

class MooraController extends Controller
{
    public function proses($tipe)
    {
        // 1. Ambil data
        $alternatif = Alternatif::where('tipe', $tipe)->get();
        $kriteria   = BobotKriteria::where('tipe', $tipe)->get();
        $penilaian  = Penilaian::whereIn('alternatif_id', $alternatif->pluck('id'))->get();

        // 2. Hitung penyebut normalisasi
        $pembagi = [];
        foreach ($kriteria as $k) {
            $pembagi[$k->id] = sqrt(
                $penilaian
                    ->where('kriteria_id', $k->id)
                    ->sum(fn($p) => pow($p->nilai, 2))
            );
        }

        // 3. Hitung Yi
        $hasil = [];
        foreach ($alternatif as $alt) {
            $yi = 0;

            foreach ($kriteria as $k) {
                $nilai = optional(
                    $penilaian
                        ->where('alternatif_id', $alt->id)
                        ->where('kriteria_id', $k->id)
                        ->first()
                )->nilai ?? 0;

                $rij = $nilai / ($pembagi[$k->id] ?: 1);
                $vij = $rij * $k->bobot;

                $yi += ($k->jenis === 'benefit') ? $vij : -$vij;
            }

            $hasil[] = [
                'alternatif' => $alt->nama,
                'yi' => round($yi, 6),
            ];
        }

        // 4. Ranking
        usort($hasil, fn($a, $b) => $b['yi'] <=> $a['yi']);

        return view('proses.hasil', compact('hasil'));
    }
}
