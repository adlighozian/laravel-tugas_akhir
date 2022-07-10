// DELETE_FORM_MODAL
const testdoang = "test";
console.log("test", testdoang);

$(document).ready(function () {
    $(".deletekode").click(function (e) {
        e.preventDefault();
        var kode_id = $(this).val();
        $("#kode_id").val(kode_id);
        $("#deletemodal").model("show");
    });
});

