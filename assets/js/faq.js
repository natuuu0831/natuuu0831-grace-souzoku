$(function () {
  var target = $('.ttl')
  target.on('click', function(){
    $(this).toggleClass('active')
    $(this).next('dd').slideToggle()
  })
})