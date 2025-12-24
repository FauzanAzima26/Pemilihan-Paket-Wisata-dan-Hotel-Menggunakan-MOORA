<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hotel.index');
    }

    public function getData()
    {
        $wisata = Hotel::query();

        return DataTables::of($wisata)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $updateUrl = route('hotel.update', $row->id);
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
            'd1' => 'required',
            'd2' => 'required',
            'd3' => 'required',
            'd4' => 'required',
            'd5' => 'required',
        ]);

        $data = $request->all();

        // simpan berita
        $wisata = Hotel::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $wisata
        ]);
    }

    public function show($id)
    {
        $wisata = Hotel::findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => [
                'nama' => $wisata->nama,
                'd1' => $wisata->d1,
                'd2' => $wisata->d2,
                'd3' => $wisata->d3,
                'd4' => $wisata->d4,
                'd5' => $wisata->d5,
            ]
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'sometimes|string|max:255',

            // Harga (Rupiah)
            'd1' => 'sometimes|numeric|min:0',

            // Skor kriteria
            'd2' => 'sometimes|numeric|min:1|max:10',
            'd3' => 'sometimes|numeric|min:1|max:24',
            'd4' => 'sometimes|numeric|min:1|max:5',
            'd5' => 'sometimes|numeric|min:1|max:10',
        ]);

        $wisata = Hotel::findOrFail($id);

        // Ambil hanya field yang dikirim & bukan null
        $data = array_filter(
            $request->only([
                'nama',
                'd1',
                'd2',
                'd3',
                'd4',
                'd5',
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
        $wisata = Hotel::findOrFail($id);

        $wisata->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
