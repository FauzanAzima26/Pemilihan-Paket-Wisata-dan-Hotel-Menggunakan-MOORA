@extends('template.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h6 class="font-bold text-slate-700 dark:text-white">
                Hasil & Rekomendasi MOORA
            </h6>
        </div>

        <!-- CARD UTAMA -->
        <div
            class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-800 shadow-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-6 space-y-8">

                <!-- STATISTIK RINGKAS -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-slate-700">
                        <p class="text-xs text-slate-500">Total Alternatif</p>
                        <p class="text-xl font-bold text-slate-700 dark:text-white">15</p>
                    </div>
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-slate-700">
                        <p class="text-xs text-slate-500">Waktu Proses</p>
                        <p class="text-xl font-bold text-slate-700 dark:text-white">1.2 detik</p>
                    </div>
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-slate-700">
                        <p class="text-xs text-slate-500">Akurasi</p>
                        <p class="text-xl font-bold text-slate-700 dark:text-white">96.8%</p>
                    </div>
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-slate-700">
                        <p class="text-xs text-slate-500">Tanggal</p>
                        <p class="text-xl font-bold text-slate-700 dark:text-white">{{ date('d M Y') }}</p>
                    </div>
                </div>

                <!-- RANKING WISATA -->
                <div>
                    <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                        Ranking Wisata Terbaik
                    </h6>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm border border-slate-200 dark:border-slate-700">
                            <thead class="bg-slate-100 dark:bg-slate-700">
                                <tr>
                                    <th class="p-3">Ranking</th>
                                    <th class="p-3 text-left">Nama Wisata</th>
                                    <th class="p-3">Lokasi</th>
                                    <th class="p-3">Nilai Yi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t dark:border-slate-700">
                                    <td class="p-3 text-center font-bold">1</td>
                                    <td class="p-3">Candi Borobudur</td>
                                    <td class="p-3 text-center">Magelang</td>
                                    <td class="p-3 text-center font-semibold text-green-600">0.945</td>
                                </tr>
                                <tr class="border-t dark:border-slate-700">
                                    <td class="p-3 text-center">2</td>
                                    <td class="p-3">Pantai Kuta</td>
                                    <td class="p-3 text-center">Bali</td>
                                    <td class="p-3 text-center">0.912</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- RANKING HOTEL -->
                <div>
                    <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                        Ranking Hotel Terbaik
                    </h6>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm border border-slate-200 dark:border-slate-700">
                            <thead class="bg-slate-100 dark:bg-slate-700">
                                <tr>
                                    <th class="p-3">Ranking</th>
                                    <th class="p-3 text-left">Hotel</th>
                                    <th class="p-3">Kota</th>
                                    <th class="p-3">Nilai Yi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t dark:border-slate-700">
                                    <td class="p-3 text-center font-bold">1</td>
                                    <td class="p-3">Hotel Aston</td>
                                    <td class="p-3 text-center">Bali</td>
                                    <td class="p-3 text-center font-semibold text-green-600">0.892</td>
                                </tr>
                                <tr class="border-t dark:border-slate-700">
                                    <td class="p-3 text-center">2</td>
                                    <td class="p-3">Grand Hyatt</td>
                                    <td class="p-3 text-center">Jakarta</td>
                                    <td class="p-3 text-center">0.865</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- REKOMENDASI AKHIR -->
                <div>
                    <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                        Rekomendasi Paket Terbaik
                    </h6>

                    <div class="p-6 rounded-lg bg-slate-50 dark:bg-slate-700">
                        <p class="font-bold text-slate-700 dark:text-white">
                            Paket “Wonderful Indonesia”
                        </p>
                        <ul class="mt-2 text-sm text-slate-600 dark:text-slate-300 list-disc list-inside">
                            <li>Wisata Unggulan: Candi Borobudur</li>
                            <li>Hotel Unggulan: Hotel Aston Bali</li>
                            <li>Durasi: 3 Hari 2 Malam</li>
                            <li>Harga: Rp 5.500.000 / orang</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
