<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use App\Models\Alternatif;
use App\Models\BobotKriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PaketWisataController extends Controller
{
    public function index()
    {
        $kriteria = BobotKriteria::where('tipe', 'wisata')->get();

        return view('paket-wisata.index', compact('kriteria'));
    }

    /**
     * DataTables
     */
    public function getData()
    {
        $data = PaketWisata::with('alternatif')->select('wisata.*');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                return '
                <button class="btn btn-danger btn-sm deleteBtn" data-id="' . $row->id . '">Hapus</button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            // 1️⃣ Cari / buat alternatif (ANTI DUPLIKAT)
            $alternatif = Alternatif::where([
                'nama' => $request->nama,
                'tipe' => 'wisata'
            ])->first();

            if (!$alternatif) {
                $alternatif = Alternatif::create([
                    'nama' => $request->nama,
                    'tipe' => 'wisata'
                ]);
            }

            // 2️⃣ Simpan paket wisata
            $wisata = PaketWisata::create([
                'nama' => $request->nama,
                'alternatif_id' => $alternatif->id
            ]);

            // 3️⃣ Simpan / update penilaian
            foreach ($request->nilai as $kriteria_id => $nilai) {
                Penilaian::updateOrCreate(
                    [
                        'alternatif_id' => $alternatif->id,
                        'kriteria_id' => $kriteria_id
                    ],
                    [
                        'nilai' => $nilai
                    ]
                );
            }
        });

        return response()->json([
            'status' => true,
            'message' => 'Wisata berhasil disimpan'
        ]);
    }

    /**
     * AMBIL DATA UNTUK EDIT
     */
    public function show($id)
    {
        $wisata = PaketWisata::with('alternatif.penilaian')->findOrFail($id);

        $penilaian = $wisata->alternatif->penilaian
            ->pluck('nilai', 'kriteria_id');

        return response()->json([
            'status' => true,
            'data' => [
                'nama' => $wisata->nama,
                'nilai' => $penilaian
            ]
        ]);
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $wisata = PaketWisata::findOrFail($id);

            // Update wisata
            $wisata->update([
                'nama' => $request->nama
            ]);

            // Update alternatif
            $wisata->alternatif->update([
                'nama' => $request->nama
            ]);

            // Update penilaian
            foreach ($request->nilai as $kriteria_id => $nilai) {
                Penilaian::where('alternatif_id', $wisata->alternatif_id)
                    ->where('kriteria_id', $kriteria_id)
                    ->update(['nilai' => $nilai]);
            }
        });

        return response()->json([
            'status' => true,
            'message' => 'Wisata berhasil diperbarui'
        ]);
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        PaketWisata::findOrFail($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
