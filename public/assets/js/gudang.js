// DELETE_FORM_MODAL_KODE_BARANG
$(document).ready(function () {
    $(".deletekodebtn").click(function (e) {
        e.preventDefault();

        var kode_id = $(this).val();
        $("#kode_id").val(kode_id);

        $("#deletemodal").modal("show");
    });
});
