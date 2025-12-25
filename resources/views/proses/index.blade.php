@extends('template.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <div class="bg-white shadow-xl rounded-2xl p-6">

            <h6 class="font-bold text-slate-700 mb-4">
                Proses MOORA
            </h6>

            <!-- TOMBOL PROSES -->
            <div class="mb-4">
                <a href="{{ route('proses.hitung', 'hotel') }}" class="btn btn-primary">
                    Proses MOORA Hotel
                </a>

                <a href="{{ route('proses.hitung', 'wisata') }}" class="btn btn-success ms-2">
                    Proses MOORA Wisata
                </a>
            </div>

            <!-- ===== HASIL MOORA ===== -->
            @if (isset($hasil) && count($hasil) > 0)
                <h6 class="font-bold text-slate-700 mb-3">
                    Hasil MOORA ({{ strtoupper($tipe) }})
                </h6>

                <div class="overflow-x-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ranking</th>
                                <th>Alternatif</th>
                                <th>Yi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $rank = 1; @endphp
                            @foreach ($hasil as $id => $nilai)
                                <tr>
                                    <td>{{ $rank++ }}</td>
                                    <td>{{ $alternatif->firstWhere('id', $id)->nama }}</td>
                                    <td>{{ number_format($nilai, 6) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    Silakan klik tombol <b>Proses MOORA</b> untuk melihat hasil perhitungan.
                </div>
            @endif

        </div>

    </div>
@endsection
