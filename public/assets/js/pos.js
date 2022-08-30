$(document).ready(function () {
    $("#example").DataTable({
        paging: false,
        info: false,
        search: "Fred",
        dom: "frtip",
    });
});
