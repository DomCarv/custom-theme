// A $( document ).ready() block.
jQuery( document ).ready(function($) {
  
   $(window).scroll(function(){
           var scrollTop = $(this).scrollTop();
   
           if(scrollTop <=50){
                   $("#navbar").css("padding", "1% 0% 1% 0%"); 
                   $("#site-logo img").css("width", "100%");
           } else {
                   $("#site-logo img").css("transition", "1s");
                   $("#navbar").css("transition", "1s");
                   $("#navbar").css("padding", "0.5% 0% 0.5% 0%"); 
                   $("#site-logo img").css("width", "50%");
           }
   
   
   });
 });