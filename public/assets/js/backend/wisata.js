$(function () {
    let storeUrl = $("#formCreate").data("store");
    let updateUrl = "/paket/wisata";

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
                data: "c1",
                name: "c1",
                render: function (data, type, row) {
                    if (type === "display" || type === "filter") {
                        return "Rp " + parseInt(data).toLocaleString("id-ID");
                    }
                    return data;
                },
            },
            {
                data: "c2",
                name: "c2",
            },
            {
                data: "c3",
                name: "c3",
            },
            {
                data: "c4",
                name: "c4",
            },
            {
                data: "c5",
                name: "c5",
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
        // reset form
        $("#wisataForm")[0].reset();

        // hapus id (penting!)
        $("#wisata_id").val("");

        // reset title
        $("#modal-title").text("Tambah Data");

        $("#wisataModal").modal("show");
    });

    //     // ==== SIMPAN BERITA ====
    $("#wisataForm").on("submit", function (e) {
        e.preventDefault();

        let id = $("#wisata_id").val(); // ambil id, kosong = tambah
        let formData = new FormData(this);

        // Ambil URL update dari tombol edit jika ada
        let url = id
            ? $("#wisataForm").data("update") || updateUrl + "/" + id
            : storeUrl;

        if (id) formData.append("_method", "PUT"); // method spoofing untuk update

        $.ajax({
            url: url,
            type: "POST", // selalu POST untuk AJAX + _method
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status) {
                    $("#wisataModal").modal("hide");
                    Table.ajax.reload();
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan",
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

    //     // --- OPEN MODAL EDIT ---
    $(document).on("click", ".editBtn", function () {
        // RESET FORM & FILE INPUT
        $("#wisataForm")[0].reset();

        let id = $(this).data("id");

        $.get("/paket/wisata/" + id, function (res) {
            let data = res.data;

            $("#wisata_id").val(id);
            $("#nama").val(data.nama);
            $("#c1").val(data.c1);
            $("#c2").val(data.c2);
            $("#c3").val(data.c3);
            $("#c4").val(data.c4);
            $("#c5").val(data.c5);

            $("#modal-title").text("Edit Data");
            $("#wisataModal").modal("show");
        });
    });

    //     // ==== DELETE BERITA ====
    $(document).on("click", ".deleteBtn", function () {
        let id = $(this).data("id");

        Swal.fire({
            title: "Yakin ingin menghapus data ini?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,

            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",

            confirmButtonColor: "#dc3545", // merah (Bootstrap danger)
            cancelButtonColor: "#6c757d", // abu (Bootstrap secondary)

            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/paket/wisata/" + id,
                    type: "POST", // method spoofing
                    data: {
                        _method: "DELETE",
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (res) {
                        if (res.status) {
                            Table.ajax.reload(null, false); // reload DataTables tanpa reset paging
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dihapus",
                                icon: "success",
                                confirmButtonText: "OK",
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire("Error", "Gagal menghapus data!", "error");
                    },
                });
            }
        });
    });
});
