<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Alternatif;
use App\Models\BobotKriteria;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HotelController extends Controller
{
    public function index()
    {
        $kriteria = BobotKriteria::where('tipe', 'hotel')->get();

        return view('hotel.index', compact('kriteria'));
    }

    /**
     * DataTables
     */
    public function getData()
    {
        $data = Hotel::with('alternatif')->select('hotel.*');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                return '
                <button class="btn btn-danger btn-sm deleteBtn" data-id="' . $row->id . '">
                    Hapus
                </button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * SIMPAN DATA (AJAX)
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            // 1️⃣ Cari / buat alternatif (ANTI DUPLIKAT)
            $alternatif = Alternatif::where([
                'nama' => $request->nama,
                'tipe' => 'hotel'
            ])->first();

            if (!$alternatif) {
                $alternatif = Alternatif::create([
                    'nama' => $request->nama,
                    'tipe' => 'hotel'
                ]);
            }

            // 2️⃣ Simpan hotel
            Hotel::create([
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
            'message' => 'Hotel berhasil disimpan'
        ]);
    }

    /**
     * AMBIL DATA UNTUK EDIT MODAL
     */
    public function show($id)
    {
        $hotel = Hotel::with('alternatif.penilaian')->findOrFail($id);

        $penilaian = $hotel->alternatif->penilaian
            ->pluck('nilai', 'kriteria_id');

        return response()->json([
            'status' => true,
            'data' => [
                'nama' => $hotel->nama,
                'nilai' => $penilaian
            ]
        ]);
    }

    /**
     * UPDATE DATA (AJAX)
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $hotel = Hotel::findOrFail($id);

            // Update hotel
            $hotel->update([
                'nama' => $request->nama
            ]);

            // Update alternatif
            $hotel->alternatif->update([
                'nama' => $request->nama
            ]);

            // Update penilaian
            foreach ($request->nilai as $kriteria_id => $nilai) {
                Penilaian::where('alternatif_id', $hotel->alternatif_id)
                    ->where('kriteria_id', $kriteria_id)
                    ->update(['nilai' => $nilai]);
            }
        });

        return response()->json([
            'status' => true,
            'message' => 'Hotel berhasil diperbarui'
        ]);
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        Hotel::findOrFail($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
