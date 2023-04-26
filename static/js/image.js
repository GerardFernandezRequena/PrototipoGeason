$(document).ready(function () {
    $("#year").val(new Date().getFullYear().toString());
    $("#month").val((new Date().getMonth()+1).toString());
});