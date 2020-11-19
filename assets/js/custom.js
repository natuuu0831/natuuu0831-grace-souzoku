$(window).on("scroll", function () {
  //スクロール位置を取得
  if ($(this).scrollTop() < 10) {
    $("#header").css("background-color", "unset");
  } else {
    $("#header").css("background-color", "#fff");
  }
});

$(function () {
  var ua = navigator.userAgent;
  if (
    ua.indexOf("iPhone") > 0 ||
    (ua.indexOf("Android") > 0 && ua.indexOf("Mobile") > 0)
  ) {
    $("head").prepend(
      '<meta name="viewport" content="width=device-width,initial-scale=1">'
    );
  } else {
    $("head").prepend('<meta name="viewport" content="width=1200">');
  }
});

$(function () {
  var pagetop = $("#pageTopButton");
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });
    pagetop.click(function() {
        $("body, html").animate({ scrollTop: 0 }, 500);
        return false;
    });

    //index用footerコンテンツ開閉
    $(".link-list__item").click(function() {
        $(this)
            .find(".slide-box")
            .slideToggle(300);
        $(this).toggleClass("active");
    });
});

//ハンバーガーメニュー
$(function () {
  var nav = $(".sp").find("nav");
  nav.css("display", "none");

  $(".menu-trigger").click(function () {
    $(this).toggleClass("active");
    nav.stop().slideToggle();
    $("body,html,footer").toggleClass("hidden");
  });
  $(".close").click(function () {
    $(".menu-trigger").removeClass("active");
    nav.stop().slideUp();
    $("body,html,footer").removeClass("hidden");
  });
});

$(window).on("load resize", function () {
  var winW = $(window).width();
  var devW = 767;
  //nav
  var target = $(".js-trigger-nav");
  var target_single = $(".js-trigger-nav-single");

  if (winW <= devW) {
    //sp

    $(function () {
      //nav
      target.on("click", function () {
        $(this).find(".dummyBox").toggleClass("switch");
        $(this).find("dd").toggleClass("active");
      });
    });
  } else {
    //pc

    $(function () {
      //nav
      target.hover(
        function () {
        $(this).find("dd").css("display", "block");
      }, function() {
        $(this).find("dd").css("display", "none");
      });
      target_single.hover(function () {
        target.find("dd").css("display", "none");
      });
    });
  }
});
