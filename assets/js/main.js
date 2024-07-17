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

    const headerMobileMenu = () => {
        $('.header .mega-menu-item-has-children > .mega-menu-link').each(function () {
            $title = $(this).text();
            $('<a href="#" class="mobile-menu__back-btn js-header-back-menu">Back</a><div class="mobile-menu__title">'+$title+'</div>').prependTo($(this).siblings('.mega-sub-menu'));
        });

        $('.js-header-back-menu').on('click', function(e) {
            e.preventDefault();

            $(this).closest('.mega-menu-item').removeClass('mega-toggle-on');
        });

        $('body').on('click', '.js-close-menu > a', function(e) {
            e.preventDefault();

            $(this).closest('.mega-menu-wrap').find('.mega-menu-toggle').trigger('click');
        });
    };

    const cptCommunity = () => {
        if ($('#search_community').length) {
            $('#search_community').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                $(this).closest('.categories').find('.search-wrapper').toggleClass('show');
            });
        }

        $(document).ready(function() {
            var queryString = window.location.search;
        
            if (queryString.includes('?post_type=community&s=')) {
                $('#search_community').addClass('active');
                $('.categories .search-wrapper').addClass('show');
            }
        });
    }

    scrollToTop();
    footerMobileCollapse();
    headerScroll();
    headerMobileMenu();
    cptCommunity();
});