<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Proses;
use App\Models\Alternatif;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use App\Models\BobotKriteria;

class ProsesController extends Controller
{
    public function index()
    {
        // index TANPA hasil
        return view('proses.index');
    }

    public function hitung($tipe)
    {
        $alternatif = Alternatif::where('tipe', $tipe)
            ->with('penilaian')
            ->get();

        $kriteria = BobotKriteria::where('tipe', $tipe)->get();

        // Matriks X
        $x = [];
        foreach ($alternatif as $a) {
            foreach ($kriteria as $k) {
                $x[$a->id][$k->id] =
                    optional(
                        $a->penilaian->where('kriteria_id', $k->id)->first()
                    )->nilai ?? 0;
            }
        }

        // Normalisasi
        $pembagi = [];
        foreach ($kriteria as $k) {
            $pembagi[$k->id] = sqrt(
                collect($x)->sum(fn($alt) => pow($alt[$k->id], 2))
            );
        }

        $rb = [];
        foreach ($alternatif as $a) {
            foreach ($kriteria as $k) {
                $r = $x[$a->id][$k->id] / ($pembagi[$k->id] ?: 1);
                $rb[$a->id][$k->id] = $r * $k->bobot;
            }
        }

        // Hitung Yi
        $hasil = [];
        foreach ($alternatif as $a) {
            $benefit = 0;
            $cost = 0;

            foreach ($kriteria as $k) {
                if ($k->jenis === 'benefit') {
                    $benefit += $rb[$a->id][$k->id];
                } else {
                    $cost += $rb[$a->id][$k->id];
                }
            }

            $hasil[$a->id] = $benefit - $cost;
        }

        arsort($hasil);

        // ⬅️ VIEW YANG SAMA
        return view('proses.index', compact(
            'alternatif',
            'kriteria',
            'rb',
            'hasil',
            'tipe'
        ));
    }
}
