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
  maxSlides: 5,
  moveSlides:1,
  slideWidth: 248,
    slideMargin: 10
  });

$('.collegeVideoSlide .bxslider').bxSlider({
    auto: true,
    mode: 'horizontal',
    controls: true,
    pager:false,
    minSlides: 1,
    nextText: '',
    prevText: '',
  maxSlides: 3,
  moveSlides:1,
  slideWidth: 217,
    slideMargin: 10
  });

$('.homeSlider .searchNav ul li').click(function(){

var showTab = $(this).attr('target-form');

$(this).addClass('active');
$(this).siblings().removeClass('active');

$('#'+showTab).addClass('active');
$('#'+showTab).siblings().removeClass('active');


});

$(".filterItems").mCustomScrollbar({
          theme:"dark-3"
        });

/****Cource courses function start****/
$('.coursesOffer h3 span.collegeClose').click(function(){

$(this).parent().parent().siblings().find('.active').removeClass('active');

var sublinkShow = $(this).parent().next('h4').attr('data-tab');

$(this).parent().parent().find('.active').removeClass('active');
$(this).parent().addClass('active');
$(this).parent().next('h4').addClass('active');
$('#'+sublinkShow).siblings().removeClass('active');
$('#'+sublinkShow).addClass('active');

});

$('.coursesOffer h4').click(function(){
  var subTab = $(this).attr('data-tab');
$(this).parent().siblings().find('.active').removeClass('active');

$(this).parent().find('h3').addClass('active');

$(this).parent().find('h4').removeClass('active');
$(this).addClass('active');

$('#'+subTab).siblings().removeClass('active');
$('#'+subTab).addClass('active');

});
/****Cource courses function close****/

/**** filter toggle start ****/
$('.collegeFilterBox.toggleFilter h4').click(function(){

$(this).parent().addClass('active');
$(this).parent().siblings().removeClass('active');

$(this).next('.toggleItems').slideDown('fast');
$(this).parent().siblings().find('.toggleItems').slideUp('fast');

});
/**** filter toggle close ****/

$('.couponHolder .regForm .inputRow input.go, .couponHolder .loginForm .inputRow input.go').click(function(){

$('#couponTab2').addClass('active');
$('#couponBox1').removeClass('active');
$('#couponBox2').addClass('active');

});

$('.iqTest .go').click(function(){

$('#couponTab3').addClass('active');
$('#couponBox2').removeClass('active');
$('#couponBox3').addClass('active');

});


/*triggering the popup*/
    if(localStorage.getItem('popState') != 'shown'){
       $('#landingpage').modal('show');
        localStorage.setItem('popState','shown')
    }
/*triggering the popup*/


	









});