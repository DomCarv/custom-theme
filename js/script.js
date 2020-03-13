// A $( document ).ready() block.
(function ($) {

        $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();

                if (scrollTop <= 50) {
                        $("#navbar").css("padding", "1% 2% 1% 2%");
                        $("#site-logo img").css("width", "100%");
                } else {
                        $("#site-logo img").css("transition", "1s");
                        $("#navbar").css("transition", "1s");
                        $("#navbar").css("padding", "0% 2% 0% 2%");
                        $("#site-logo img").css("width", "80%");
                }

        });
})(jQuery);
