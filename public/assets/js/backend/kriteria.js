$(function () {
    let storeUrl = $("#formCreate").data("store");
    let updateUrl = "/bobot/kriteria";

    let tipe = "hotel";
    let table;

    $(document).ready(function () {
        table = $("#kriteriaTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/bobot/kriteria/data",
                data: function (d) {
                    d.tipe = tipe;
                },
                dataSrc: function (json) {
                    console.log(json.data); // 🔥 WAJIB
                    return json.data;
                },
            },
            columns: [
                { data: "DT_RowIndex", orderable: false, searchable: false },
                { data: "nama" },
                {
                    data: "jenis",
                    createdCell: function (td, cellData) {
                        console.log("JENIS:", cellData); // 🔥 WAJIB
                        $(td).html(cellData);
                    },
                },
                { data: "bobot" },
                {
                    data: "aksi",
                    createdCell: function (td, cellData) {
                        $(td).html(cellData);
                    },
                },
            ],
        });

        // TAB CLICK
        $(".tab-btn").on("click", function () {
            $(".tab-btn")
                .removeClass("text-blue-500 border-blue-500 font-semibold")
                .addClass("text-gray-500 border-transparent font-medium");

            $(this)
                .removeClass("text-gray-500 border-transparent font-medium")
                .addClass("text-blue-500 border-blue-500 font-semibold");

            tipe = $(this).data("tipe");
            $("#tipe").val(tipe);

            table.ajax.reload();

            console.log("Tab aktif:", tipe);
        });

        $(".tab-btn[data-tipe='hotel']").trigger("click");
    });

    // ===== OPEN MODAL ADD =====
    $("#btnAdd").on("click", function () {
        // reset form
        $("#kriteriaForm")[0].reset();

        // hapus id (penting!)
        $("#kriteria_id").val("");

        let tipe = $(".tab-btn.text-blue-500").data("tipe");
        $("#tipe").val(tipe);

        // reset title
        $("#modal-title").text("Tambah Data");

        $("#kriteriaModal").modal("show");
    });

    //     // ==== SIMPAN BERITA ====
    $("#kriteriaForm").on("submit", function (e) {
        e.preventDefault();

        let id = $("#kriteria_id").val(); // ambil id, kosong = tambah
        let formData = new FormData(this);

        // Ambil URL update dari tombol edit jika ada
        let url = id
            ? $("#kriteriaForm").data("update") || updateUrl + "/" + id
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
                    $("#kriteriaModal").modal("hide");
                    table.ajax.reload();
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
        $("#kriteriaForm")[0].reset();

        let id = $(this).data("id");

        $.get("/bobot/kriteria/" + id, function (res) {
            let data = res.data;

            $("#kriteria_id").val(id);
            $("#nama").val(data.nama);
            $("#jenis").val(data.jenis);
            $("#bobot").val(data.bobot);

            $("#modal-title").text("Edit Data");
            $("#kriteriaModal").modal("show");
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
                    url: "/bobot/kriteria/" + id,
                    type: "POST", // method spoofing
                    data: {
                        _method: "DELETE",
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (res) {
                        if (res.status) {
                            table.ajax.reload(null, false); // reload DataTables tanpa reset paging
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
