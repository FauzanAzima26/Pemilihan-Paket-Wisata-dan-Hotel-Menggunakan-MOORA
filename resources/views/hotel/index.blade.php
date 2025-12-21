@extends('template.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h6 class="font-bold text-slate-700 dark:text-white">
                Data Hotel
            </h6>

            <button class="px-4 py-2 text-xs font-bold text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-600">
                + Tambah Hotel
            </button>
        </div>

        <!-- CARD -->
        <div
            class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-850 shadow-xl rounded-2xl bg-clip-border">

            <div class="flex-auto p-6">
                <div class="overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-sm text-slate-500 dark:text-white">

                        <!-- HEADER TABLE -->
                        <thead class="align-bottom bg-gray-100 dark:bg-slate-700 text-slate-700 dark:text-white">
                            <tr>
                                <th class="px-4 py-3 font-semibold text-left">Hotel</th>
                                <th class="px-4 py-3 font-semibold text-left">Harga</th>
                                <th class="px-4 py-3 font-semibold text-left">Fasilitas</th>
                                <th class="px-4 py-3 font-semibold text-left">Lokasi</th>
                                <th class="px-4 py-3 font-semibold text-left">Rating</th>
                                <th class="px-4 py-3 font-semibold text-left">Pelayanan</th>
                                <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>

                        <!-- BODY TABLE -->
                        <tbody>

                            <tr class="border-b dark:border-white/20">
                                <td class="px-4 py-3 font-semibold text-slate-700 dark:text-white">
                                    Hotel Santika
                                </td>
                                <td class="px-4 py-3">750.000</td>
                                <td class="px-4 py-3">Lengkap</td>
                                <td class="px-4 py-3">Pusat Kota</td>
                                <td class="px-4 py-3">4.5</td>
                                <td class="px-4 py-3">Baik</td>
                                <td class="px-4 py-3 text-center space-x-2">
                                    <button class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded">
                                        Edit
                                    </button>
                                    <button class="px-3 py-1 text-xs font-bold text-white bg-blue-500 rounded">
                                        Nilai
                                    </button>
                                </td>
                            </tr>

                            <tr class="border-b dark:border-white/20">
                                <td class="px-4 py-3 font-semibold text-slate-700 dark:text-white">
                                    Hotel Aston
                                </td>
                                <td class="px-4 py-3">950.000</td>
                                <td class="px-4 py-3">Sangat Lengkap</td>
                                <td class="px-4 py-3">Dekat Mall</td>
                                <td class="px-4 py-3">4.7</td>
                                <td class="px-4 py-3">Sangat Baik</td>
                                <td class="px-4 py-3 text-center space-x-2">
                                    <button class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded">
                                        Edit
                                    </button>
                                    <button class="px-3 py-1 text-xs font-bold text-white bg-blue-500 rounded">
                                        Nilai
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-700 dark:text-white">
                                    Hotel Ibis
                                </td>
                                <td class="px-4 py-3">650.000</td>
                                <td class="px-4 py-3">Standar</td>
                                <td class="px-4 py-3">Dekat Stasiun</td>
                                <td class="px-4 py-3">4.2</td>
                                <td class="px-4 py-3">Baik</td>
                                <td class="px-4 py-3 text-center space-x-2">
                                    <button class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded">
                                        Edit
                                    </button>
                                    <button class="px-3 py-1 text-xs font-bold text-white bg-blue-500 rounded">
                                        Nilai
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
