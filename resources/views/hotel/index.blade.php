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
                            Data Hotel
                        </h6>

                        <button type="button" id="btnAdd"
                            class="inline-block px-4 py-2 text-xs font-bold text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-600">
                            + Tambah
                        </button>
                    </div>

                    <!-- CARD BODY -->
                    <div class="flex-auto p-6 pt-4">
                        <div class="overflow-x-auto">
                            <table data-url="{{ route('hotel.data') }}" id="hotelTable"
                                class="items-center w-full mb-0 align-top border-collapse text-sm text-slate-500 dark:text-white">
                                <thead class="align-bottom bg-gray-100 dark:bg-slate-700 text-slate-700 dark:text-white">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold text-left">No</th>
                                        <th class="px-4 py-3 font-semibold text-left">Nama</th>
                                        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- END CARD BODY -->

                </div>
            </div>

        </div>
    </div>

    @include('hotel.ModalForm')

    @push('scripts')
        <script src="{{ asset('assets/js/backend/hotel.js') }}"></script>
    @endpush
@endsection
