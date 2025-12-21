@extends('template.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <!-- ROW -->
        <div class="flex flex-wrap -mx-3">

            <div class="w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-850 shadow-xl dark:shadow-dark-xl rounded-2xl bg-clip-border">

                    <!-- CARD HEADER (SAMAN DENGAN DASHBOARD) -->
                    <div class="p-6 pb-0 flex justify-between items-center">
                        <h6 class="font-bold text-slate-700 dark:text-white">
                            Data Paket Wisata
                        </h6>

                        <a href="#"
                            class="inline-block px-4 py-2 text-xs font-bold text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-600">
                            + Tambah Paket
                        </a>
                    </div>

                    <!-- CARD BODY -->
                    <div class="flex-auto p-6 pt-4">
                        <div class="overflow-x-auto">
                            <table
                                class="items-center w-full mb-0 align-top border-collapse text-sm text-slate-500 dark:text-white">
                                <thead class="align-bottom bg-gray-100 dark:bg-slate-700 text-slate-700 dark:text-white">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold text-left">Paket</th>
                                        <th class="px-4 py-3 font-semibold text-left">Harga</th>
                                        <th class="px-4 py-3 font-semibold text-left">Fasilitas</th>
                                        <th class="px-4 py-3 font-semibold text-left">Durasi</th>
                                        <th class="px-4 py-3 font-semibold text-left">Rating</th>
                                        <th class="px-4 py-3 font-semibold text-left">Akses</th>
                                        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="border-b dark:border-white/20">
                                        <td class="px-4 py-3 font-semibold text-slate-700 dark:text-white">
                                            Paket Bali Hemat
                                        </td>
                                        <td class="px-4 py-3">6.000.000</td>
                                        <td class="px-4 py-3">Hotel, Transport, Guide</td>
                                        <td class="px-4 py-3">3 Hari</td>
                                        <td class="px-4 py-3">4.6</td>
                                        <td class="px-4 py-3">Mudah</td>
                                        <td class="px-4 py-3 text-center space-x-2">
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded">
                                                Edit
                                            </button>
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-red-500 rounded">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <tr class="border-b dark:border-white/20">
                                        <td class="px-4 py-3 font-semibold text-slate-700 dark:text-white">
                                            Paket Lombok Eksklusif
                                        </td>
                                        <td class="px-4 py-3">8.500.000</td>
                                        <td class="px-4 py-3">Resort, Transport, Makan</td>
                                        <td class="px-4 py-3">4 Hari</td>
                                        <td class="px-4 py-3">4.8</td>
                                        <td class="px-4 py-3">Sedang</td>
                                        <td class="px-4 py-3 text-center space-x-2">
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded">
                                                Edit
                                            </button>
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-red-500 rounded">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <tr class="border-b dark:border-white/20">
                                        <td class="px-4 py-3 font-semibold text-slate-700 dark:text-white">
                                            Paket Yogyakarta Budaya
                                        </td>
                                        <td class="px-4 py-3">4.200.000</td>
                                        <td class="px-4 py-3">Hotel, Tiket Wisata</td>
                                        <td class="px-4 py-3">2 Hari</td>
                                        <td class="px-4 py-3">4.3</td>
                                        <td class="px-4 py-3">Mudah</td>
                                        <td class="px-4 py-3 text-center space-x-2">
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded">
                                                Edit
                                            </button>
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-red-500 rounded">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-4 py-3 font-semibold text-slate-700 dark:text-white">
                                            Paket Raja Ampat Premium
                                        </td>
                                        <td class="px-4 py-3">15.000.000</td>
                                        <td class="px-4 py-3">Resort, Kapal, Diving</td>
                                        <td class="px-4 py-3">5 Hari</td>
                                        <td class="px-4 py-3">4.9</td>
                                        <td class="px-4 py-3">Sulit</td>
                                        <td class="px-4 py-3 text-center space-x-2">
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded">
                                                Edit
                                            </button>
                                            <button class="px-3 py-1 text-xs font-bold text-white bg-red-500 rounded">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END CARD BODY -->

                </div>
            </div>

        </div>
    </div>
@endsection
