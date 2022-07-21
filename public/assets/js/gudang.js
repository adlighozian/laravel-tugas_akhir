// DELETE_FORM_MODAL_KODE_BARANG
$(document).ready(function () {
    $(".deletekodebtn").click(function (e) {
        e.preventDefault();

        var kode_id = $(this).val();
        $("#kode_id").val(kode_id);

        $("#deletemodal").modal("show");
    });
});

// FILTER STOCK
function stokhabis() {
    var tball = document.getElementById("tball");
    var tbsegera = document.getElementById("tbsegera");
    var tbhabis = document.getElementById("tbhabis");
    var tbtersedia = document.getElementById("tbtersedia");

    tbhabis.classList.remove("hidden");
    tbsegera.classList.add("hidden");
    tball.classList.add("hidden");
    tbtersedia.classList.add("hidden");
}

function stoksegera() {
    var tball = document.getElementById("tball");
    var tbsegera = document.getElementById("tbsegera");
    var tbhabis = document.getElementById("tbhabis");
    var tbtersedia = document.getElementById("tbtersedia");

    tbhabis.classList.add("hidden");
    tbsegera.classList.remove("hidden");
    tball.classList.add("hidden");
    tbtersedia.classList.add("hidden");
}
function stoktersedia() {
    var tball = document.getElementById("tball");
    var tbsegera = document.getElementById("tbsegera");
    var tbhabis = document.getElementById("tbhabis");
    var tbtersedia = document.getElementById("tbtersedia");

    tbhabis.classList.add("hidden");
    tbsegera.classList.add("hidden");
    tball.classList.add("hidden");
    tbtersedia.classList.remove("hidden");
}
