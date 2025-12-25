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

        let id = $("#hotel_id").val();
        let formData = new FormData(this);

        let url = id ? "/hotel/" + id : "/hotel";
        if (id) formData.append("_method", "PUT");

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $("#hotelModal").modal("hide");
                Table.ajax.reload();
            },
        });
    });

    //     // --- OPEN MODAL EDIT ---
    $(document).on("click", ".editBtn", function () {
        let id = $(this).data("id");

        $.get("/hotel/" + id, function (res) {
            $("#hotel_id").val(id);
            $("#nama").val(res.data.nama);

            // isi nilai kriteria
            $.each(res.data.nilai, function (kriteria_id, nilai) {
                $("#kriteria_" + kriteria_id).val(nilai);
            });

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
