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
  
});