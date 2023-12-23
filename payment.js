$(document).ready(function () {
  $("#vehicle").change(function () {
    var fdate = $(this).find(":selected").data("fdate");
    var tdate = $(this).find(":selected").data("tdate");
    var vid = $(this).find(":selected").data("vid");

    console.log(tdate);

    $("#fdate").val(fdate);
    $("#tDate").val(tdate);
    $("#vid").val(vid);
  });
});
