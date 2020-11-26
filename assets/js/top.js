$(function () {
  $("#header").addClass("noBg");
});
$(window).on("scroll", function () {
  //スクロール位置を取得
  if ($(this).scrollTop() < 10) {
    $("#header").css("background-color", "unset");
    $("#header").addClass("noBg");
  } else {
    $("#header").css("background-color", "#fff");
    $("#header").removeClass("noBg");
  }
});
