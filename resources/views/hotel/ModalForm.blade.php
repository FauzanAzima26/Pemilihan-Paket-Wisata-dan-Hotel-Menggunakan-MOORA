<!-- Modal Form Input/Edit Hotel -->
<div class="modal fade" id="hotelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Tambah Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="hotelForm" data-store="{{ route('hotel.store') }}">
                @csrf
                <input type="hidden" name="id" id="hotel_id">

                <div class="modal-body">
                    <div class="row">

                        {{-- NAMA HOTEL --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Nama Hotel</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        {{-- KRITERIA --}}
                        @foreach ($kriteria as $k)
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    {{ $k->nama }}
                                    <span class="badge bg-{{ $k->jenis == 'cost' ? 'danger' : 'success' }}">
                                        {{ strtoupper($k->jenis) }}
                                    </span>
                                </label>

                                <input type="number" step="0.01" class="form-control"
                                    name="nilai[{{ $k->id }}]" id="kriteria_{{ $k->id }}" required>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
