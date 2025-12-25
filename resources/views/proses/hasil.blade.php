@extends('template.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="bg-white shadow-xl rounded-2xl">

            <div class="p-6">
                <h6 class="font-bold text-slate-700">
                    Hasil MOORA ({{ strtoupper($tipe) }})
                </h6>
            </div>

            <div class="p-6 overflow-x-auto">

                <table class="w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-2">Alternatif</th>
                            @foreach ($kriteria as $k)
                                <th class="px-3 py-2">{{ $k->nama }}</th>
                            @endforeach
                            <th class="px-3 py-2">Yi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($hasil as $id => $nilai)
                            <tr class="border-t">
                                <td class="px-3 py-2 font-semibold">
                                    {{ $alternatif->firstWhere('id', $id)->nama }}
                                </td>

                                @foreach ($kriteria as $k)
                                    <td class="px-3 py-2 text-center">
                                        {{ number_format($rb[$id][$k->id], 4) }}
                                    </td>
                                @endforeach

                                <td class="px-3 py-2 font-bold text-center">
                                    {{ number_format($nilai, 4) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
