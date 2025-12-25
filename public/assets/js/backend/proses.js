let tipeAktif = "hotel";

$.ajaxSetup({
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
});

function loadProses() {
    $.get(`/proses/data?tipe=${tipeAktif}`, (res) => {
        let tbody = $("#prosesTable tbody");
        tbody.empty();
        res.data.forEach((item, index) => {
            tbody.append(`
                <tr>
                    <td class="text-center">${index + 1}</td>
                    <td>${item.alternatif}</td>
                    <td class="text-center font-bold">${item.nilai_yi}</td>
                    <td class="text-center">
                        <span class="px-2 py-1 bg-blue-500 text-white rounded">${
                            item.ranking
                        }</span>
                    </td>
                    <td class="text-center">-</td>
                </tr>
            `);
        });
    });
}

$("#btnRefresh").on("click", function () {
    $.post(`/proses/hitung/${tipeAktif}`, () => {
        loadProses(); // cukup loadProses, jangan reload page
    });
});

$(".tab-btn").on("click", function () {
    $(".tab-btn")
        .removeClass("border-blue-500 text-blue-600")
        .addClass("text-gray-500 border-transparent");
    $(this).addClass("border-blue-500 text-blue-600");
    tipeAktif = $(this).data("tipe");
    loadProses();
});

$("#btnHitung").on("click", function() {
    $.post(`/proses/hitung/${tipeAktif}`, {}, function(res){
        if(res.status){
            location.reload(); // reload agar Blade bisa menampilkan session
        }
    });
});


$(document).ready(loadProses);
