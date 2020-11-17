
$(window).on('scroll', function(){
    //スクロール位置を取得
    if ( $(this).scrollTop() < 10 ) {
        $('#header').css("background-color","unset")
      } else {
        $('#header').css("background-color","#fff")
      }
})

//ハンバーガーメニュー
$(function () {
    var nav = $('.sp').find('nav');
    nav.css("display","none")

    $('.menu-trigger').click(function () {
      $(this).toggleClass('active');
      if ($(this).hasClass('active')) {
        nav.slideDown()
      } else {
        nav.slideUp();
      }
    })
    $('.close').click(function () {
        $('.menu-trigger').removeClass('active');
        nav.slideUp();
      })
  })

  $(window).on('load resize', function(){

    var winW = $(window).width();
    var devW = 767;
    //nav
    var target = $('.js-trigger-nav');
    var target_single = $('.js-trigger-nav-single');

    if (winW <= devW) {
      //sp

      $(function(){
        //nav
        target.on('click', function(){
            $(this).find('.dummyBox').toggleClass('switch')
            $(this).find('dd').toggleClass('active')
        })
    })

    } else {
        //pc

        $(function(){
            //nav
           target.hover(
               function(){
                   console.log('ok')
                target.find('dd').css("display","none")
                 $(this).find('dd').css("display","block")
               }
           )
           target_single.hover(
               function(){
                target.find('dd').css("display","none")
               }
           )
        })
    }
  });