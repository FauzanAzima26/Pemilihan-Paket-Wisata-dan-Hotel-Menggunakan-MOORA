<!-- Modal Form Input/Edit Kriteria -->
<div class="modal fade" id="kriteriaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="kriteriaForm" data-store="{{ route('bobot.kriteria.store') }}">
                @csrf
                <input type="hidden" name="id" id="kriteria_id">

                <div class="modal-body">

                    <!-- Nama -->
                    <div class="mb-3">
                        <label class="form-label">Nama Kriteria <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>

                    <!-- Jenis -->
                    <div class="mb-3">
                        <label class="form-label">Jenis <span class="text-danger">*</span></label>
                        <select class="form-control" name="jenis" id="jenis" required>
                            <option value="">-- Pilih --</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                    </div>

                    <!-- Bobot -->
                    <div class="mb-3">
                        <label class="form-label">Bobot <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="bobot" id="bobot" step="0.001"
                            min="0" max="1" required>
                        <small class="text-muted">Contoh: 0.250</small>
                    </div>

                    <!-- Tipe -->
                    <input type="hidden" name="tipe" id="tipe">

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
