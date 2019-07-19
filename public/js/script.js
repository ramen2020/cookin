$(function(){
    
      $(window).scroll(function (){
      $('.fadein').each(function(){

          var position = $(this).offset().top;
          var scroll = $(window).scrollTop();
          var windowHeight = $(window).height();

          if (scroll > position - windowHeight + 100){
              $(this).addClass('scrollin');
          }else{
            $(this).removeClass('scrollin');
          }
      });
  });
  
  $(".text").t({
      speed:40,
      caret:false,
    });
    
    
  $(window).scroll(function(){
      if($(this).scrollTop()>100) {
        $('.scrollTopBtn').fadeIn();
      }else {
        $('.scrollTopBtn').fadeOut();
      }
  });

  $('.scrollTopBtn').click(function(){
    $('html, body').animate({
      scrollTop:0
    })
  });
  
});