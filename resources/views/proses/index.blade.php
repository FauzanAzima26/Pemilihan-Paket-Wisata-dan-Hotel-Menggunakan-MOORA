@extends('template.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h6 class="font-bold text-slate-700 dark:text-white">
                Proses Perhitungan MOORA
            </h6>

            <div class="flex gap-2">
                <button class="px-4 py-2 text-xs font-bold text-white uppercase bg-green-500 rounded-lg hover:bg-green-600">
                    📥 Export Hasil
                </button>
                <button class="px-4 py-2 text-xs font-bold text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-600">
                    🔄 Hitung Ulang
                </button>
            </div>
        </div>

        <!-- INFORMASI DATA (ROW) -->
        <div class="mb-6 bg-white dark:bg-slate-850 shadow rounded-2xl px-6 py-4">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <!-- Jumlah Hotel -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-500/20">
                        🏨
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-300">
                            Jumlah Hotel
                        </p>
                        <p class="font-bold text-slate-700 dark:text-white">
                            5 Hotel
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="hidden md:block h-10 w-px bg-slate-200 dark:bg-slate-700"></div>

                <!-- Jumlah Kriteria -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-purple-100 dark:bg-purple-500/20">
                        📊
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-300">
                            Jumlah Kriteria
                        </p>
                        <p class="font-bold text-slate-700 dark:text-white">
                            5 Kriteria
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="hidden md:block h-10 w-px bg-slate-200 dark:bg-slate-700"></div>

                <!-- Status -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-100 dark:bg-green-500/20">
                        ✅
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-300">
                            Status Perhitungan
                        </p>
                        <p class="font-bold text-green-600">
                            Selesai
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- TAB PROSES MOORA -->
        <div class="bg-white dark:bg-slate-850 shadow-xl rounded-2xl mb-6 overflow-hidden">

            <div class="flex overflow-x-auto border-b dark:border-slate-700">
                <button type="button" data-tab="matriks"
                    class="tab-button px-6 py-4 font-semibold text-slate-700 dark:text-white border-b-2 border-blue-500 bg-blue-50 dark:bg-slate-800 whitespace-nowrap">
                    1. Matriks Keputusan
                </button>

                <button type="button" data-tab="normalisasi"
                    class="tab-button px-6 py-4 font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-white whitespace-nowrap">
                    2. Normalisasi
                </button>

                <button type="button" data-tab="terbobot"
                    class="tab-button px-6 py-4 font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-white whitespace-nowrap">
                    3. Normalisasi Terbobot
                </button>

                <button type="button" data-tab="nilai-yi"
                    class="tab-button px-6 py-4 font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-white whitespace-nowrap">
                    4. Nilai Yi
                </button>

                <button type="button" data-tab="ranking"
                    class="tab-button px-6 py-4 font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-white whitespace-nowrap">
                    5. Ranking
                </button>
            </div>

            <!-- TAB CONTENTS -->
            <div class="p-6">

                <!-- TAB 1: Matriks Keputusan -->
                <div id="tab-matriks" class="tab-content">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-700 dark:text-white mb-2">Matriks Keputusan Awal</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            X<sub>ij</sub> = Matriks awal yang berisi nilai alternatif untuk setiap kriteria
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-gray-100 dark:bg-slate-700">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-left text-slate-700 dark:text-white">Alternatif
                                        / Kriteria</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Harga
                                        (Cost)<br>w=0.3</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Fasilitas
                                        (Benefit)<br>w=0.25</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Lokasi
                                        (Benefit)<br>w=0.2</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Rating
                                        (Benefit)<br>w=0.15</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Pelayanan
                                        (Benefit)<br>w=0.1</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Santika</td>
                                    <td class="px-4 py-3 text-center">750000</td>
                                    <td class="px-4 py-3 text-center">85</td>
                                    <td class="px-4 py-3 text-center">90</td>
                                    <td class="px-4 py-3 text-center">4.5</td>
                                    <td class="px-4 py-3 text-center">88</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Aston</td>
                                    <td class="px-4 py-3 text-center">950000</td>
                                    <td class="px-4 py-3 text-center">95</td>
                                    <td class="px-4 py-3 text-center">85</td>
                                    <td class="px-4 py-3 text-center">4.7</td>
                                    <td class="px-4 py-3 text-center">92</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Ibis</td>
                                    <td class="px-4 py-3 text-center">650000</td>
                                    <td class="px-4 py-3 text-center">75</td>
                                    <td class="px-4 py-3 text-center">80</td>
                                    <td class="px-4 py-3 text-center">4.2</td>
                                    <td class="px-4 py-3 text-center">85</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Grand</td>
                                    <td class="px-4 py-3 text-center">850000</td>
                                    <td class="px-4 py-3 text-center">88</td>
                                    <td class="px-4 py-3 text-center">92</td>
                                    <td class="px-4 py-3 text-center">4.6</td>
                                    <td class="px-4 py-3 text-center">90</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold">Hotel Plaza</td>
                                    <td class="px-4 py-3 text-center">720000</td>
                                    <td class="px-4 py-3 text-center">82</td>
                                    <td class="px-4 py-3 text-center">87</td>
                                    <td class="px-4 py-3 text-center">4.4</td>
                                    <td class="px-4 py-3 text-center">87</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 p-4 bg-blue-50 dark:bg-slate-800 rounded-lg">
                        <p class="text-sm text-blue-700 dark:text-blue-300">
                            <strong>Keterangan:</strong> Kriteria dibagi menjadi <span class="text-green-600">Benefit</span>
                            (semakin besar semakin baik)
                            dan <span class="text-red-600">Cost</span> (semakin kecil semakin baik).
                        </p>
                    </div>
                </div>

                <!-- TAB 2: Normalisasi -->
                <div id="tab-normalisasi" class="tab-content hidden">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-700 dark:text-white mb-2">Matriks Ternormalisasi (R)</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            r<sub>ij</sub> = x<sub>ij</sub> / √(∑ x<sub>ij</sub>²) untuk kriteria benefit<br>
                            r<sub>ij</sub> = 1 - [x<sub>ij</sub> / √(∑ x<sub>ij</sub>²)] untuk kriteria cost
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-gray-100 dark:bg-slate-700">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-left text-slate-700 dark:text-white">Alternatif
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Harga
                                        (Cost)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">
                                        Fasilitas
                                        (Benefit)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Lokasi
                                        (Benefit)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Rating
                                        (Benefit)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">
                                        Pelayanan
                                        (Benefit)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Santika</td>
                                    <td class="px-4 py-3 text-center">0.423</td>
                                    <td class="px-4 py-3 text-center">0.458</td>
                                    <td class="px-4 py-3 text-center">0.472</td>
                                    <td class="px-4 py-3 text-center">0.463</td>
                                    <td class="px-4 py-3 text-center">0.460</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Aston</td>
                                    <td class="px-4 py-3 text-center">0.296</td>
                                    <td class="px-4 py-3 text-center">0.512</td>
                                    <td class="px-4 py-3 text-center">0.446</td>
                                    <td class="px-4 py-3 text-center">0.483</td>
                                    <td class="px-4 py-3 text-center">0.481</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Ibis</td>
                                    <td class="px-4 py-3 text-center">0.511</td>
                                    <td class="px-4 py-3 text-center">0.404</td>
                                    <td class="px-4 py-3 text-center">0.420</td>
                                    <td class="px-4 py-3 text-center">0.432</td>
                                    <td class="px-4 py-3 text-center">0.444</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Grand</td>
                                    <td class="px-4 py-3 text-center">0.343</td>
                                    <td class="px-4 py-3 text-center">0.474</td>
                                    <td class="px-4 py-3 text-center">0.483</td>
                                    <td class="px-4 py-3 text-center">0.473</td>
                                    <td class="px-4 py-3 text-center">0.470</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold">Hotel Plaza</td>
                                    <td class="px-4 py-3 text-center">0.440</td>
                                    <td class="px-4 py-3 text-center">0.442</td>
                                    <td class="px-4 py-3 text-center">0.457</td>
                                    <td class="px-4 py-3 text-center">0.452</td>
                                    <td class="px-4 py-3 text-center">0.455</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 3: Normalisasi Terbobot -->
                <div id="tab-terbobot" class="tab-content hidden">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-700 dark:text-white mb-2">Matriks Ternormalisasi Terbobot
                            (V)</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            v<sub>ij</sub> = w<sub>j</sub> × r<sub>ij</sub>
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-gray-100 dark:bg-slate-700">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-left text-slate-700 dark:text-white">Alternatif
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Harga
                                        (w=0.3)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">
                                        Fasilitas (w=0.25)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Lokasi
                                        (w=0.2)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Rating
                                        (w=0.15)</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">
                                        Pelayanan (w=0.1)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Santika</td>
                                    <td class="px-4 py-3 text-center">0.127</td>
                                    <td class="px-4 py-3 text-center">0.115</td>
                                    <td class="px-4 py-3 text-center">0.094</td>
                                    <td class="px-4 py-3 text-center">0.069</td>
                                    <td class="px-4 py-3 text-center">0.046</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Aston</td>
                                    <td class="px-4 py-3 text-center">0.089</td>
                                    <td class="px-4 py-3 text-center">0.128</td>
                                    <td class="px-4 py-3 text-center">0.089</td>
                                    <td class="px-4 py-3 text-center">0.072</td>
                                    <td class="px-4 py-3 text-center">0.048</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Ibis</td>
                                    <td class="px-4 py-3 text-center">0.153</td>
                                    <td class="px-4 py-3 text-center">0.101</td>
                                    <td class="px-4 py-3 text-center">0.084</td>
                                    <td class="px-4 py-3 text-center">0.065</td>
                                    <td class="px-4 py-3 text-center">0.044</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Grand</td>
                                    <td class="px-4 py-3 text-center">0.103</td>
                                    <td class="px-4 py-3 text-center">0.119</td>
                                    <td class="px-4 py-3 text-center">0.097</td>
                                    <td class="px-4 py-3 text-center">0.071</td>
                                    <td class="px-4 py-3 text-center">0.047</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold">Hotel Plaza</td>
                                    <td class="px-4 py-3 text-center">0.132</td>
                                    <td class="px-4 py-3 text-center">0.111</td>
                                    <td class="px-4 py-3 text-center">0.091</td>
                                    <td class="px-4 py-3 text-center">0.068</td>
                                    <td class="px-4 py-3 text-center">0.045</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 4: Nilai Yi -->
                <div id="tab-nilai-yi" class="tab-content hidden">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-700 dark:text-white mb-2">Nilai Yi (Optimasi)</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            Y<sub>i</sub> = ∑ v<sub>ij</sub> (benefit) - ∑ v<sub>ij</sub> (cost)
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-gray-100 dark:bg-slate-700">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-left text-slate-700 dark:text-white">Alternatif
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">∑
                                        Benefit</th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">∑ Cost
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Nilai Yi
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">
                                        Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Santika</td>
                                    <td class="px-4 py-3 text-center">0.324</td>
                                    <td class="px-4 py-3 text-center">0.127</td>
                                    <td class="px-4 py-3 text-center font-bold">0.197</td>
                                    <td class="px-4 py-3 text-center">Yi = 0.324 - 0.127</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Aston</td>
                                    <td class="px-4 py-3 text-center">0.337</td>
                                    <td class="px-4 py-3 text-center">0.089</td>
                                    <td class="px-4 py-3 text-center font-bold">0.248</td>
                                    <td class="px-4 py-3 text-center">Yi = 0.337 - 0.089</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Ibis</td>
                                    <td class="px-4 py-3 text-center">0.294</td>
                                    <td class="px-4 py-3 text-center">0.153</td>
                                    <td class="px-4 py-3 text-center font-bold">0.141</td>
                                    <td class="px-4 py-3 text-center">Yi = 0.294 - 0.153</td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 font-semibold">Hotel Grand</td>
                                    <td class="px-4 py-3 text-center">0.334</td>
                                    <td class="px-4 py-3 text-center">0.103</td>
                                    <td class="px-4 py-3 text-center font-bold">0.231</td>
                                    <td class="px-4 py-3 text-center">Yi = 0.334 - 0.103</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold">Hotel Plaza</td>
                                    <td class="px-4 py-3 text-center">0.315</td>
                                    <td class="px-4 py-3 text-center">0.132</td>
                                    <td class="px-4 py-3 text-center font-bold">0.183</td>
                                    <td class="px-4 py-3 text-center">Yi = 0.315 - 0.132</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 5: Ranking -->
                <div id="tab-ranking" class="tab-content hidden">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-700 dark:text-white mb-2">Hasil Ranking Hotel</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            Ranking berdasarkan nilai Yi tertinggi ke terendah
                        </p>
                    </div>

                    <div class="overflow-x-auto mb-6">
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-gray-100 dark:bg-slate-700">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Ranking
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-left text-slate-700 dark:text-white">Nama Hotel
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Nilai Yi
                                    </th>
                                    <th class="px-4 py-3 font-semibold text-center text-slate-700 dark:text-white">Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-slate-700 bg-green-50 dark:bg-slate-800/50">
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-500 text-white font-bold">
                                            1
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 font-semibold">Hotel Aston</td>
                                    <td class="px-4 py-3 text-center font-bold text-green-600">0.248</td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-3 py-1 text-xs font-bold text-white bg-green-500 rounded-full">
                                            Rekomendasi Terbaik
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white font-bold">
                                            2
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 font-semibold">Hotel Grand</td>
                                    <td class="px-4 py-3 text-center font-bold">0.231</td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-3 py-1 text-xs font-bold text-white bg-blue-500 rounded-full">
                                            Rekomendasi
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-500 text-white font-bold">
                                            3
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 font-semibold">Hotel Santika</td>
                                    <td class="px-4 py-3 text-center font-bold">0.197</td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded-full">
                                            Alternatif
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-slate-700">
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-orange-500 text-white font-bold">
                                            4
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 font-semibold">Hotel Plaza</td>
                                    <td class="px-4 py-3 text-center font-bold">0.183</td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-3 py-1 text-xs font-bold text-white bg-orange-500 rounded-full">
                                            Alternatif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-500 text-white font-bold">
                                            5
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 font-semibold">Hotel Ibis</td>
                                    <td class="px-4 py-3 text-center font-bold">0.141</td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-3 py-1 text-xs font-bold text-white bg-red-500 rounded-full">
                                            Terakhir
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- KESIMPULAN -->
                    <div class="p-4 bg-green-50 dark:bg-slate-800 rounded-lg">
                        <h4 class="font-bold text-green-700 dark:text-green-300 mb-2">🏆 Kesimpulan</h4>
                        <p class="text-sm text-green-700 dark:text-green-300">
                            Berdasarkan perhitungan metode MOORA, <strong>Hotel Aston</strong> merupakan hotel terbaik
                            dengan nilai Yi tertinggi (0.248).
                            Hotel ini memiliki kombinasi optimal antara fasilitas yang lengkap, rating tinggi, pelayanan
                            baik, dengan harga yang masih kompetitif.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFO METODE -->
        <div class="bg-white dark:bg-slate-850 shadow-xl rounded-2xl p-6">
            <h3 class="text-lg font-bold text-slate-700 dark:text-white mb-4">📋 Tentang Metode MOORA</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-blue-50 dark:bg-slate-800 rounded-lg">
                    <h4 class="font-bold text-blue-700 dark:text-blue-300 mb-2">Langkah-langkah MOORA</h4>
                    <ul class="text-sm text-blue-700 dark:text-blue-300 list-disc pl-5 space-y-1">
                        <li>1. Menyusun matriks keputusan (X)</li>
                        <li>2. Normalisasi matriks (R)</li>
                        <li>3. Pembobotan matriks ternormalisasi (V)</li>
                        <li>4. Menghitung nilai optimasi (Yi)</li>
                        <li>5. Ranking berdasarkan nilai Yi</li>
                    </ul>
                </div>
                <div class="p-4 bg-green-50 dark:bg-slate-800 rounded-lg">
                    <h4 class="font-bold text-green-700 dark:text-green-300 mb-2">Rumus Perhitungan</h4>
                    <ul class="text-sm text-green-700 dark:text-green-300 space-y-2">
                        <li><strong>Normalisasi:</strong> r<sub>ij</sub> = x<sub>ij</sub> / √(∑ x<sub>ij</sub>²)</li>
                        <li><strong>Optimasi:</strong> Y<sub>i</sub> = ∑ w<sub>j</sub>r<sub>ij</sub> (benefit) - ∑
                            w<sub>j</sub>r<sub>ij</sub> (cost)</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            // Show first tab by default
            tabContents[0].classList.remove('hidden');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');

                    // Update active tab button
                    tabButtons.forEach(btn => {
                        btn.classList.remove('border-blue-500', 'bg-blue-50',
                            'dark:bg-slate-800');
                        btn.classList.add('text-slate-500', 'dark:text-slate-400');
                        btn.classList.remove('text-slate-700', 'dark:text-white');
                    });

                    this.classList.add('border-blue-500', 'bg-blue-50', 'dark:bg-slate-800');
                    this.classList.add('text-slate-700', 'dark:text-white');
                    this.classList.remove('text-slate-500', 'dark:text-slate-400');

                    // Show selected tab content
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    document.getElementById(`tab-${tabId}`).classList.remove('hidden');
                });
            });
        });
    </script>
@endpush
