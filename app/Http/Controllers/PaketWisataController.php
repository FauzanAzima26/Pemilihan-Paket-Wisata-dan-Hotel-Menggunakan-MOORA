<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('paket-wisata.index');
    }

    public function getData()
    {
        $wisata = PaketWisata::query();

        return DataTables::of($wisata)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $updateUrl = route('paket.wisata.update', $row->id);
                return '
                <div class="d-flex gap-1">
                    <button class="btn btn-warning btn-sm editBtn"
                        data-id="' . $row->id . '"
                        data-update="' . $updateUrl . '">
                        <i class="ni ni-ruler-pencil"></i>
                    </button>
                    <button class="btn btn-danger btn-sm deleteBtn" data-id="' . $row->id . '">
                        <i class="ni ni-fat-remove"></i>
                    </button>
                    </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'c5' => 'required',
        ]);

        $data = $request->all();

        // simpan berita
        $wisata = PaketWisata::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $wisata
        ]);
    }

    public function show($id)
    {
        $wisata = PaketWisata::findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => [
                'nama' => $wisata->nama,
                'c1' => $wisata->c1,
                'c2' => $wisata->c2,
                'c3' => $wisata->c3,
                'c4' => $wisata->c4,
                'c5' => $wisata->c5,
            ]
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'sometimes|string|max:255',

            // Harga (Rupiah)
            'c1' => 'sometimes|numeric|min:0',

            // Skor kriteria
            'c2' => 'sometimes|numeric|min:1|max:10',
            'c3' => 'sometimes|numeric|min:1|max:24',
            'c4' => 'sometimes|numeric|min:1|max:5',
            'c5' => 'sometimes|numeric|min:1|max:10',
        ]);

        $wisata = PaketWisata::findOrFail($id);

        // Ambil hanya field yang dikirim & bukan null
        $data = array_filter(
            $request->only([
                'nama',
                'c1',
                'c2',
                'c3',
                'c4',
                'c5',
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

    public function destroy($id)
    {
        $wisata = PaketWisata::findOrFail($id);

        $wisata->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
