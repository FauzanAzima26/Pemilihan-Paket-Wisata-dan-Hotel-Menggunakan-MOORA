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
