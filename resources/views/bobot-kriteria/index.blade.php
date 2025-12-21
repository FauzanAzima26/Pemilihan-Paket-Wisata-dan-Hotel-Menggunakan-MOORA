@extends('template.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h6 class="font-bold text-slate-700 dark:text-white">
                Proses Perhitungan MOORA
            </h6>
        </div>

        <!-- CARD -->
        <div
            class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-850 shadow-xl rounded-2xl bg-clip-border">

            <div class="flex-auto p-6">

                <!-- TAB NAV -->
                <div class="flex flex-wrap gap-2 mb-6 border-b dark:border-slate-700">
                    <button class="px-4 py-2 text-sm font-semibold border-b-2 border-blue-500 text-blue-500">
                        Matriks Keputusan
                    </button>
                    <button class="px-4 py-2 text-sm text-slate-500 hover:text-blue-500">
                        Normalisasi
                    </button>
                    <button class="px-4 py-2 text-sm text-slate-500 hover:text-blue-500">
                        Normalisasi Terbobot
                    </button>
                    <button class="px-4 py-2 text-sm text-slate-500 hover:text-blue-500">
                        Nilai Yi
                    </button>
                    <button class="px-4 py-2 text-sm text-slate-500 hover:text-blue-500">
                        Ranking
                    </button>
                </div>

                <!-- 1. MATRIKS KEPUTUSAN -->
                <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                    1. Matriks Keputusan
                </h6>

                <div class="overflow-x-auto mb-6">
                    <table class="w-full text-sm border border-slate-200 dark:border-slate-700">
                        <thead class="bg-slate-100 dark:bg-slate-700">
                            <tr>
                                <th class="p-3 text-left">Hotel</th>
                                <th class="p-3">Harga</th>
                                <th class="p-3">Fasilitas</th>
                                <th class="p-3">Lokasi</th>
                                <th class="p-3">Rating</th>
                                <th class="p-3">Pelayanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel A</td>
                                <td class="p-3 text-center">600</td>
                                <td class="p-3 text-center">4</td>
                                <td class="p-3 text-center">3</td>
                                <td class="p-3 text-center">4.6</td>
                                <td class="p-3 text-center">4</td>
                            </tr>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel B</td>
                                <td class="p-3 text-center">750</td>
                                <td class="p-3 text-center">5</td>
                                <td class="p-3 text-center">4</td>
                                <td class="p-3 text-center">4.8</td>
                                <td class="p-3 text-center">5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- 2. NORMALISASI -->
                <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                    2. Normalisasi
                </h6>

                <div class="overflow-x-auto mb-6">
                    <table class="w-full text-sm border border-slate-200 dark:border-slate-700">
                        <thead class="bg-slate-100 dark:bg-slate-700">
                            <tr>
                                <th class="p-3 text-left">Hotel</th>
                                <th class="p-3">C1</th>
                                <th class="p-3">C2</th>
                                <th class="p-3">C3</th>
                                <th class="p-3">C4</th>
                                <th class="p-3">C5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel A</td>
                                <td class="p-3 text-center">0.63</td>
                                <td class="p-3 text-center">0.62</td>
                                <td class="p-3 text-center">0.60</td>
                                <td class="p-3 text-center">0.65</td>
                                <td class="p-3 text-center">0.61</td>
                            </tr>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel B</td>
                                <td class="p-3 text-center">0.78</td>
                                <td class="p-3 text-center">0.78</td>
                                <td class="p-3 text-center">0.80</td>
                                <td class="p-3 text-center">0.76</td>
                                <td class="p-3 text-center">0.78</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- 3. NORMALISASI TERBOBOT -->
                <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                    3. Normalisasi Terbobot
                </h6>

                <div class="overflow-x-auto mb-6">
                    <table class="w-full text-sm border border-slate-200 dark:border-slate-700">
                        <thead class="bg-slate-100 dark:bg-slate-700">
                            <tr>
                                <th class="p-3 text-left">Hotel</th>
                                <th class="p-3">C1</th>
                                <th class="p-3">C2</th>
                                <th class="p-3">C3</th>
                                <th class="p-3">C4</th>
                                <th class="p-3">C5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel A</td>
                                <td class="p-3 text-center">0.16</td>
                                <td class="p-3 text-center">0.12</td>
                                <td class="p-3 text-center">0.12</td>
                                <td class="p-3 text-center">0.13</td>
                                <td class="p-3 text-center">0.09</td>
                            </tr>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel B</td>
                                <td class="p-3 text-center">0.20</td>
                                <td class="p-3 text-center">0.16</td>
                                <td class="p-3 text-center">0.16</td>
                                <td class="p-3 text-center">0.15</td>
                                <td class="p-3 text-center">0.15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- 4. NILAI Yi -->
                <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                    4. Nilai Yi
                </h6>

                <div class="overflow-x-auto mb-6">
                    <table class="w-full text-sm border border-slate-200 dark:border-slate-700">
                        <thead class="bg-slate-100 dark:bg-slate-700">
                            <tr>
                                <th class="p-3 text-left">Hotel</th>
                                <th class="p-3">Yi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel A</td>
                                <td class="p-3 text-center">0.46</td>
                            </tr>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3">Hotel B</td>
                                <td class="p-3 text-center">0.62</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- 5. RANKING -->
                <h6 class="font-semibold text-slate-700 dark:text-white mb-3">
                    5. Ranking
                </h6>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-slate-200 dark:border-slate-700">
                        <thead class="bg-slate-100 dark:bg-slate-700">
                            <tr>
                                <th class="p-3">Ranking</th>
                                <th class="p-3">Hotel</th>
                                <th class="p-3">Yi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3 text-center">1</td>
                                <td class="p-3 text-center">Hotel B</td>
                                <td class="p-3 text-center">0.62</td>
                            </tr>
                            <tr class="border-t dark:border-slate-700">
                                <td class="p-3 text-center">2</td>
                                <td class="p-3 text-center">Hotel A</td>
                                <td class="p-3 text-center">0.46</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
