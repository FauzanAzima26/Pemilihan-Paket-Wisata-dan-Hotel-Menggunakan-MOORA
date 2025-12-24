$(function () {
    let storeUrl = $("#formCreate").data("store");
    let updateUrl = "/hotel";

    let Table = $("#hotelTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#hotelTable").data("url"),
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
                data: "d1",
                name: "d1",
                render: function (data, type, row) {
                    if (type === "display" || type === "filter") {
                        return "Rp " + parseInt(data).toLocaleString("id-ID");
                    }
                    return data;
                },
            },
            {
                data: "d2",
                name: "d2",
            },
            {
                data: "d3",
                name: "d3",
            },
            {
                data: "d4",
                name: "d4",
            },
            {
                data: "d5",
                name: "d5",
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
        $("#hotelForm")[0].reset();

        // hapus id (penting!)
        $("#hotel_id").val("");

        // reset title
        $("#modal-title").text("Tambah Data");

        $("#hotelModal").modal("show");
    });

    //     // ==== SIMPAN BERITA ====
    $("#hotelForm").on("submit", function (e) {
        e.preventDefault();

        let id = $("#hotel_id").val(); // ambil id, kosong = tambah
        let formData = new FormData(this);

        // Ambil URL update dari tombol edit jika ada
        let url = id
            ? $("#hotelForm").data("update") || updateUrl + "/" + id
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
                    $("#hotelModal").modal("hide");
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
        $("#hotelForm")[0].reset();

        let id = $(this).data("id");

        $.get("/hotel/" + id, function (res) {
            let data = res.data;

            $("#hotel_id").val(id);
            $("#nama").val(data.nama);
            $("#d1").val(data.d1);
            $("#d2").val(data.d2);
            $("#d3").val(data.d3);
            $("#d4").val(data.d4);
            $("#d5").val(data.d5);

            $("#modal-title").text("Edit Data");
            $("#hotelModal").modal("show");
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
                    url: "/hotel/" + id,
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
