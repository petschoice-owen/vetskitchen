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
        function setHeaderHeight(){
            var totalHeight = 0;
            $('header.header > div').each(function() {
                totalHeight += $(this).outerHeight(true); // include margin in the height
            });
            $('header.header').css('height', totalHeight);
        }
        // setHeaderHeight();
        // $(window).on('load resize', function() {
        //     setTimeout(() => {
        //         setHeaderHeight();
        //     }, 2000);
        // });
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
                        $wrapper.imagesLoaded().progress(function() {
                            $wrapper.masonry('layout');
                        });
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

    const productQuantity = () => {
        // Quantity buttons
        $(document).on('click', '.quantity .plus-btn, .quantity .minus-btn', function() {
            var $quantityInput = $(this).closest('.quantity').find('.qty');
            var currentValue = parseFloat($quantityInput.val());
            var max_value = $quantityInput.attr('max') ? parseFloat($quantityInput.attr('max')) : '';
            var step = $quantityInput.attr('step') ? parseFloat($quantityInput.attr('step')) : 1;
            if ($(this).is('.plus-btn')) {
                if (max_value !== '' && (max_value <= currentValue)) {
                    return;
                }
                $quantityInput.val(currentValue + step);
            } else {
                if (currentValue > 1) {
                    $quantityInput.val(currentValue - step);
                }
            }

            $quantityInput.trigger('change');
        });
    };

    const gridListToggler = () => {
        $(document).on('click', '.vk-view-buttons a', function(e) {
            e.preventDefault();
            var $class = 'columns-3';
            if($(this).hasClass('list-view')) {
                $class = 'columns-1';
            }else if($(this).hasClass('two-col-view')) {
                $class = 'columns-2';
            }else if($(this).hasClass('four-col-view')) {
                $class = 'columns-4';
            }
            $('.vk-view-buttons a').not($(this)).removeClass('active');
            $(this).addClass('active');
            $('ul.products').removeClass(function (index, css) {
                return (css.match (/\bcolumns-\S+/g) || []).join(' ');
            }).addClass($class);
        });

        if($('.vk-view-buttons').length > 0) {
            $(window).on('load resize', function() {
                if($(window).width() < 992) {
                    if($('.vk-view-buttons .active').hasClass('three-col-view') || $('.vk-view-buttons .active').hasClass('four-col-view')) {
                        $('.vk-view-buttons .two-col-view').trigger('click');
                    }
                }
            });
        }
    };

    const variationSwatch = () => {
        $(document).on('click', '.variation-swatches .swatch', function(e) {
            $(this).closest('.product').find('.variation-swatches .swatch').not($(this)).removeClass('active');
            $(this).addClass('active');
            $(this).closest('.product').find('.product-price').html($(this).data('price'));
        });
    };

    const shopSidebar = () => {
        $(document).on('click', '.vk-shop-sidebar .widget-title', function(e) {
            if($(this).hasClass('close')) {
                $(this).removeClass('close');
                $(this).siblings('.wp-widget-group__inner-blocks').slideDown();
            }else {
                $(this).addClass('close');
                $(this).siblings('.wp-widget-group__inner-blocks').slideUp();
            }
        });

        $(document).on('click', '.js-mobile-shop-filter', function(e) {
            e.preventDefault();
            $('.vk-shop-sidebar').addClass('open');
            $('.mobile-overlay').show();
        });
    };

    const cartCheckout = () => {
        if($('.woocommerce-cart').length > 0 || $('.woocommerce-checkout').length > 0) {
            function updateCartCheckoutNotice() {
                $.ajax({
                    url: wpAjax.ajaxUrl,
                    type: 'POST',
                    data: {
                        action: 'vk_check_cart_total'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#cart-checkout-notice').remove();
                            if (response.data.notice) {
                                $('.woocommerce-notices-wrapper:eq(0)').append('<div id="cart-checkout-notice">' + response.data.notice + '</div>');
                                $('#payment').hide();
                                $('.wc-proceed-to-checkout').hide();
                            }
                        }
                    }
                });
            }
            
            if($('.woocommerce-cart').length > 0 && !$('.empty-cart').length > 0) {
                updateCartCheckoutNotice();
            }
        
            $(document.body).on('updated_cart_totals', function() {
                updateCartCheckoutNotice();
            });

            $(document.body).on('updated_checkout', function() {
                updateCartCheckoutNotice();
            });
        }

        if($('.woocommerce-checkout').length > 0) {
            function hasSubscriptionProducts() {
                var hasSubscription = false;
                $('body').find('.cart_item').each(function() {
                    if ($(this).find('.subscription-price').length > 0) {
                        hasSubscription = true;
                        return false;
                    }
                });
        
                return hasSubscription;
            }
            if(hasSubscriptionProducts()) {
                $('input[name="_mc4wp_subscribe_woocommerce"]').prop('checked', true);
            } else {
                $('input[name="_mc4wp_subscribe_woocommerce"]').prop('checked', false);
            }
        }
    };

    const mobileNavPopup = () => {
        $(document).on('click', '.mobile-overlay', function(e) {
            $('.js-mobile-nav-popup.open').removeClass('open');
            $(this).hide();
        });

        $(document).on('click', '.js-mobile-nav-popup .close', function(e) {
            $(this).closest('.js-mobile-nav-popup').removeClass('open');
            $('.mobile-overlay').hide();
        });

        $(document).on('click', '.js-cart-mobile', function(e) {
            e.preventDefault();
            $('.mobile-minicart').addClass('open');
            $('.mobile-overlay').show();
        });

        $(document).on('click', '.header__account--mobile', function(e) {
            e.preventDefault();
            $('.mobile-account').addClass('open');
            $('.mobile-overlay').show();
        });

        $(document).on('click', '.js-mobile-search', function(e) {
            e.preventDefault();
            $('.mobile-search').toggleClass('open');
        });
    };

    const registrationFixes = () => {
        if($('.vk-registration').length > 0) {
            if($('.woocommerce-notices-wrapper').is(':empty')) {
                $('.acf-input input[type="text"]').val('');
                $('.acf-date-picker input[type="hidden"]').val('');
                $('.acf-input input[type="date"]').val('');
                $('.acf-input select').val('');
                $('.acf-input input[type="radio"]').prop('checked', false);
                $('.acf-input input[type="checkbox"]').prop('checked', false);
            }
        }
    };

    const productAccordion = () => {
        if($('.single-product').length > 0) {
            $(document).on('click', '.vk-tab-toggler', function(e) {
                e.preventDefault();
                $(this).closest('.woocommerce-tabs').find('.vk-tab-toggler').not($(this)).removeClass('active');
                $(this).toggleClass('active');
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
    productQuantity();
    gridListToggler();
    variationSwatch();
    shopSidebar();
    cartCheckout();
    mobileNavPopup();
    registrationFixes();
    productAccordion();
});