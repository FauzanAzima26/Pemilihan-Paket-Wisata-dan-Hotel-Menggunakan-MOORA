$(function () {
    let storeUrl = $("#formCreate").data("store");
    let updateUrl = "/";

    let Table = $("#wisataTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#wisataTable").data("url"),
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "nama",
                name: "nama",
            },
            {
                data: "aksi",
                name: "aksi",
                orderable: false,
                searchable: false,
            },
        ],
    });

    // ===== OPEN MODAL ADD =====
    $("#btnAdd").on("click", function () {
        $("#wisataForm")[0].reset();
        $("#wisata_id").val("");
        $("#modal-title").text("Tambah Data");
        $("#wisataModal").modal("show");
    });

    // ===== SIMPAN DATA =====
    $("#wisataForm").on("submit", function (e) {
        e.preventDefault();

        let id = $("#wisata_id").val();
        let formData = new FormData(this);

        let url = id ? updateUrl + "/" + id : storeUrl;
        if (id) formData.append("_method", "PUT");

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status) {
                    $("#wisataModal").modal("hide");
                    Table.ajax.reload();

                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil disimpan",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                }
            },
            error: function (xhr) {
                Swal.fire(
                    "Error",
                    xhr.responseJSON?.message ?? "Terjadi kesalahan",
                    "error"
                );
            },
        });
    });

    // ===== OPEN MODAL EDIT =====
    $(document).on("click", ".editBtn", function () {
        let id = $(this).data("id");

        $("#wisataForm")[0].reset();

        $.get("/" + id, function (res) {
            $("#wisata_id").val(id);
            $("#nama").val(res.data.nama);

            // isi nilai kriteria (DINAMIS)
            $.each(res.data.nilai, function (kriteria_id, nilai) {
                $("#kriteria_" + kriteria_id).val(nilai);
            });

            $("#modal-title").text("Edit Data");
            $("#wisataModal").modal("show");
        });
    });

    // ===== DELETE =====
    $(document).on("click", ".deleteBtn", function () {
        let id = $(this).data("id");

        Swal.fire({
            title: "Yakin ingin menghapus data ini?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
            confirmButtonColor: "#dc3545",
            cancelButtonColor: "#6c757d",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/" + id,
                    type: "POST",
                    data: {
                        _method: "DELETE",
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (res) {
                        if (res.status) {
                            Table.ajax.reload(null, false);
                            Swal.fire(
                                "Berhasil",
                                "Data berhasil dihapus",
                                "success"
                            );
                        }
                    },
                });
            }
        });
    });
});
