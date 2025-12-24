<!-- Modal Form Input/Edit Hotel -->
<div class="modal fade" id="hotelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="hotelForm" data-store="{{ route('hotel.store') }}">
                @csrf
                <input type="hidden" name="id" id="hotel_id">

                <div class="modal-body">
                    <div class="row">

                        <!-- Nama Hotel -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Nama Hotel <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>

                        <!-- Harga -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga (Rupiah) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="d1" id="d1" min="0"
                                    step="1000" required>
                            </div>
                        </div>

                        <!-- Fasilitas -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fasilitas (1–10)</label>
                            <input type="number" class="form-control" name="d2" id="d2" min="1"
                                max="10" step="0.1" required>
                        </div>

                        <!-- Lokasi -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lokasi (1–10)</label>
                            <input type="number" class="form-control" name="d3" id="d3" min="1"
                                max="10" step="0.1" required>
                        </div>

                        <!-- Rating -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rating (1–5)</label>
                            <input type="number" class="form-control" name="d4" id="d4" min="1"
                                max="5" step="0.1" required>
                        </div>

                        <!-- Pelayanan -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Pelayanan (1–10)</label>
                            <input type="number" class="form-control" name="d5" id="d5" min="1"
                                max="10" step="0.1" required>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="background:#6c757d;color:#fff">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary" style="background:#0d6efd;color:#fff">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
