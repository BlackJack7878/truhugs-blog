jQuery(document).ready(function($) {

 $('.hu-single-slider').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: false,
  infinite: true,
  speed: 300,
  autoplaySpeed: 5000,
  arrows: false,
  // centerMod:true,
  variableWidth: true,
  dots: false,
  mobileFirst: false,
  responsive: [
  {
    breakpoint: 1600,
    settings: {
      slidesToShow: 3,
      centerMod:true,
    }
  },
  {
    breakpoint: 1260,
    settings: {
      cssEase: 'ease',
      slidesToShow: 2,
      slidesToScroll: 2,
      centerMode: true
    }
  },
  {
    breakpoint: 600,
    settings: {
      cssEase: 'ease',
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true

    }
  }
  ]

});

 $('.prev').click(function(){
  $('.hu-single-slider').slick('slickPrev');
})
 $('.next').click(function(){
  $('.hu-single-slider').slick('slickNext');
});

 //

 var btn = $('#go-top');

 btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

 //

 if ($(window).width()>1200) {

   var sidebar = new StickySidebar('#sidebar', {
    containerSelector: '#main-content',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: 40,
    bottomSpacing: 20
  });

 }



 //



});