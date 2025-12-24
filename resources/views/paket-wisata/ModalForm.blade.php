<!-- Modal Form Input/Edit -->
<div class="modal fade" id="wisataModal" tabindex="-1" aria-labelledby="wisataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wisataModalLabel">Tambah Paket Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="wisataForm" enctype="multipart/form-data" data-store="{{ route('paket.wisata.store') }}">
                @csrf
                <input type="hidden" id="wisata_id" name="id">

                <div class="modal-body">
                    <div class="row">
                        <!-- Nama Paket -->
                        <div class="col-md-12 mb-3">
                            <label for="nama" class="form-label">Nama Paket <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                            <div class="invalid-feedback">Nama paket wajib diisi</div>
                        </div>

                        <!-- Harga (C1) -->
                        <div class="col-md-6 mb-3">
                            <label for="c1" class="form-label">Harga (Rupiah) <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="c1" name="c1" min="0"
                                    step="1000" required>
                            </div>
                            <small class="text-muted">Masukkan harga dalam rupiah (contoh: 500000)</small>
                            <div class="invalid-feedback">Harga wajib diisi</div>
                        </div>

                        <!-- Fasilitas (C2) -->
                        <div class="col-md-6 mb-3">
                            <label for="c2" class="form-label">Fasilitas (Skala 1-10) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="c2" name="c2" min="1"
                                max="10" step="0.1" required>
                            <small class="text-muted">Skala 1 (terburuk) sampai 10 (terbaik)</small>
                            <div class="invalid-feedback">Fasilitas wajib diisi (1-10)</div>
                        </div>

                        <!-- Durasi (C3) -->
                        <div class="col-md-6 mb-3">
                            <label for="c3" class="form-label">Durasi (Jam) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="c3" name="c3" min="1"
                                max="24" step="0.1" required>
                            <small class="text-muted">Durasi dalam jam (contoh: 4.5 jam)</small>
                            <div class="invalid-feedback">Durasi wajib diisi (1-24 jam)</div>
                        </div>

                        <!-- Rating (C4) -->
                        <div class="col-md-6 mb-3">
                            <label for="c4" class="form-label">Rating (Skala 1-5) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="c4" name="c4" min="1"
                                max="5" step="0.1" required>
                            <small class="text-muted">Skala 1 (terburuk) sampai 5 (terbaik)</small>
                            <div class="invalid-feedback">Rating wajib diisi (1-5)</div>
                        </div>

                        <!-- Akses (C5) -->
                        <div class="col-md-12 mb-3">
                            <label for="c5" class="form-label">Akses (Skala 1-10) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="c5" name="c5" min="1"
                                max="10" step="0.1" required>
                            <small class="text-muted">Skala 1 (sulit) sampai 10 (sangat mudah)</small>
                            <div class="invalid-feedback">Akses wajib diisi (1-10)</div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="background-color:#6c757d;color:#fff">
                        Batal
                    </button>


                    <button type="submit" class="btn btn-primary" style="background-color:#0d6efd;color:#fff">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
