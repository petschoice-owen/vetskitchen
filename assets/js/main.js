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

                var $searchWrapper = $(this).closest('.categories').find('.search-wrapper');
                $searchWrapper.toggleClass('show');

                var $searchField = $searchWrapper.find('.search-field');
                $searchField.focus();

                var val = $searchField.val();
                $searchField.val('');
                $searchField.val(val);
            });
        }

        $(document).ready(function() {
            var queryString = window.location.search;
        
            if (queryString.includes('?post_type=community&s=')) {
                $('#search_community').addClass('active');
                $('.categories .search-wrapper').addClass('show');
            }
        });
    };

    const cptNews = () => {
        if ($('#search_news').length) {
            $('#search_news').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');

                var $searchWrapper = $(this).closest('.categories').find('.search-wrapper');
                $searchWrapper.toggleClass('show');

                var $searchField = $searchWrapper.find('.search-field');
                $searchField.focus();

                var val = $searchField.val();
                $searchField.val('');
                $searchField.val(val);
            });
        }

        $(document).ready(function() {
            var queryString = window.location.search;
        
            if (queryString.includes('?post_type=news&s=')) {
                $('#search_news').addClass('active');
                $('.categories .search-wrapper').addClass('show');
            }
        });
    };

    const loadMore = () => {
        if ( $('.js-posts-load-more').length ) {
            var $page = 2;

            $('.js-posts-load-more').on('click', function(e) {
                e.preventDefault();
                
                var $this = $(this),
                    $tax = $this.data('tax'),
                    $term = $this.data('term'),
                    $wrapper = $this.closest('.js-container').find('.js-posts-grid'),
                    $loader = $this.closest('.js-container').find('.vk-loader'),
                    $type = $this.data('post-type');
                
                $this.hide();
                $loader.show();
        
                $.ajax({
                    url: wpAjax.ajaxUrl,
                    data: { 
                        action: 'vk_posts_load_more',
                        page: $page,
                        type: $type,
                        tax: $tax,
                        term: $term
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        $page++;
                        $this.show();
                        $loader.hide();
                        $wrapper.append(result.content);
                        $wrapper.masonry('reloadItems');
                        $wrapper.masonry('layout');
                        if (result.page === result.max_page) {
                            $this.hide();
                        } else {
                            $this.show();
                        }
                    },
                    error: function() {
                        $this.show();
                        $loader.hide();
                        alert('There was an error loading more posts.');
                    }
                });
            });
        }
        
    };

    scrollToTop();
    footerMobileCollapse();
    headerScroll();
    headerMobileMenu();
    cptCommunity();
    cptNews();
    loadMore();
});