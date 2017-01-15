$(document).ready(function(){

     $('.subMenuLeft ol li').mouseover(function(){
        var menuId = $(this).attr('menu-id');

       $(this).parent().parent().parent().parent().parent().siblings().find('.subMenuLeft ol li').removeClass('active');
       $(this).parent().parent().parent().parent().parent().siblings().find('.subMenuRight .subMenuHold').removeClass('active');

       $(this).parent().parent().parent().parent().parent().siblings().find('.subMenuLeft ol li:first-child').addClass('active');
       $(this).parent().parent().parent().parent().parent().siblings().find('.subMenuRight .subMenuHold:first-child').addClass('active');

       $(this).siblings().removeClass('active');
       $('#'+menuId).siblings().removeClass('active');

       $(this).addClass('active');
       $('#'+menuId).addClass('active');


    });

$('.homeSlider .bxslider').bxSlider({
    auto: true,
    mode: 'fade',
    controls: false
  });

$('.featureSlider .bxslider').bxSlider({
    auto: true,
    mode: 'horizontal',
    controls: true,
    pager:false,
    minSlides: 1,
	maxSlides: 4,
	moveSlides:1,
	slideWidth: 267,
    slideMargin: 10
  });

$('.homeSlider .searchNav ul li').click(function(){

var showTab = $(this).attr('target-form');

$(this).addClass('active');
$(this).siblings().removeClass('active');

$('#'+showTab).addClass('active');
$('#'+showTab).siblings().removeClass('active');


});


});