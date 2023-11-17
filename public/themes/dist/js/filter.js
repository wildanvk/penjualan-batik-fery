$(document).ready(function () {
  $("#category").change(function () {
    filter();
  });
  $("#keyword").keypress(function (event) {
    if (event.keyCode == 13) {
      // 13 adalah kode untuk tombol enter
      filter();
    }
  });
  var filter = function () {
    var category = $("#category").val();
    var keyword = $("#keyword").val();
    window.location.href =
      "/product?category=" + category + "&keyword=" + keyword;
  };
});
