<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotKriteria;
use Yajra\DataTables\Facades\DataTables;

class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bobot-kriteria.index');
    }

    public function getData(Request $request)
    {
        $wisata = BobotKriteria::query();

        if ($request->filled('tipe')) {
            $wisata->where('tipe', $request->tipe);
        }

        return DataTables::of($wisata)
            ->addIndexColumn()
            ->addColumn('jenis', function ($row) {
                return $row->jenis === 'benefit'
                    ? '<span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Benefit</span>'
                    : '<span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Cost</span>';
            })
            ->addColumn('aksi', function ($row) {
                $updateUrl = route('bobot.kriteria.update', $row->id);
                return '
            <div class="d-flex gap-1">
                <button class="btn btn-warning btn-sm editBtn" data-id="' . $row->id . '" data-update="' . $updateUrl . '">
                    <i class="ni ni-ruler-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm deleteBtn" data-id="' . $row->id . '">
                    <i class="ni ni-fat-remove"></i>
                </button>
            </div>
        ';
            })
            ->rawColumns(['jenis', 'aksi'])
            ->make(true);  // jangan pakai json_encode lagi

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'bobot' => 'required',
            'tipe' => 'required',
        ]);

        $data = $request->all();

        // simpan berita
        $wisata = BobotKriteria::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $wisata
        ]);
    }

    public function show($id)
    {
        $wisata = BobotKriteria::findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => [
                'nama' => $wisata->nama,
                'jenis' => $wisata->jenis,
                'bobot' => $wisata->bobot,
            ]
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'sometimes|string|max:255',

            // Jenis: benefit atau cost
            'jenis' => 'sometimes|string|in:benefit,cost',

            // Bobot: angka >= 0
            'bobot' => 'sometimes|numeric|min:0',
        ]);

        $wisata = BobotKriteria::findOrFail($id);

        // Ambil hanya field yang dikirim & bukan null
        $data = array_filter(
            $request->only([
                'nama',
                'jenis',
                'bobot',
            ]),
            fn($v) => $v !== null
        );

        // Update data teks
        $wisata->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $wisata
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wisata = BobotKriteria::findOrFail($id);

        $wisata->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
