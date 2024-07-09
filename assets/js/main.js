jQuery(function($) {
    const scrollToTop = () => {
        $(window).on('scroll', function() {
            if($(this).scrollTop() > 500) {
                $('.js-back-to-top').addClass('show');
            }else {
                $('.js-back-to-top').removeClass('show');
            }
        });

        $('.js-back-to-top').on('click', function(e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: 0
            }, 10);
        });
    };

    const footerMobileCollapse = () => {
        $('.js-footer-mobile-collapse .footer__main-title').on('click', function(e) {
            $(this).toggleClass('open');
        });
    };

    const headerScroll = () => {
        $(window).on('scroll', function() {
            if($(window).scrollTop() > $('.header').height()) {
                $('.header__fixedscroll').addClass('fixed');
            }else {
                $('.header__fixedscroll').removeClass('fixed');
            }
        });
    };

    scrollToTop();
    footerMobileCollapse();
    headerScroll();
});