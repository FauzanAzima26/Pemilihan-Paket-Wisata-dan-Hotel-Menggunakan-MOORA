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
            'nama'  => 'required|string',
            'jenis' => 'required|in:benefit,cost',
            'bobot' => 'required|numeric|min:0',
            'tipe'  => 'required|in:hotel,wisata',
        ]);

        // Hitung total bobot per tipe
        $totalBobot = BobotKriteria::where('tipe', $request->tipe)->sum('bobot');
        $totalBobot += $request->bobot;

        if (round($totalBobot, 3) > 1.000) {
            return response()->json([
                'status' => false,
                'message' => 'Total bobot untuk tipe ' . $request->tipe . ' melebihi 1'
            ], 422);
        }

        $kriteria = BobotKriteria::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Bobot kriteria berhasil ditambahkan',
            'data' => $kriteria
        ]);
    }

    public function show($id)
    {
        $kriteria = BobotKriteria::findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => [
                'nama'  => $kriteria->nama,
                'jenis' => $kriteria->jenis,
                'bobot' => $kriteria->bobot,
                'tipe'  => $kriteria->tipe,
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'sometimes|string|max:255',
            'jenis' => 'sometimes|in:benefit,cost',
            'bobot' => 'sometimes|numeric|min:0',
        ]);

        $kriteria = BobotKriteria::findOrFail($id);

        if ($request->has('bobot')) {
            $totalBobot = BobotKriteria::where('tipe', $kriteria->tipe)
                ->where('id', '!=', $kriteria->id)
                ->sum('bobot');

            $totalBobot += $request->bobot;

            if (round($totalBobot, 3) > 1.000) {
                return response()->json([
                    'status' => false,
                    'message' => 'Total bobot melebihi 1'
                ], 422);
            }
        }

        $kriteria->update($request->only(['nama', 'jenis', 'bobot']));

        return response()->json([
            'status' => true,
            'message' => 'Bobot kriteria berhasil diperbarui'
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
