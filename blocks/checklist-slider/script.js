jQuery(function ($) {
    $('.js-checklist-slider').each(function () {
        var thisSlider = $(this);

        function initChecklistSliderHandler(){
            $(window).width() > 1024 ? unSlickChecklistSlider() : initSlickChecklistSlider();
        }

        function initSlickChecklistSlider() {
            if(thisSlider.hasClass('slick-slider')) return false;
            thisSlider.slick({
                dots: false,
                arrows: false,
                infinite: true,
                adaptiveHeight: true,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 680,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }
        
        function unSlickChecklistSlider() {
            if(!thisSlider.hasClass('slick-slider')) return false;
            setTimeout(function(){ 
                thisSlider.slick('unslick');
            }, 200);
        }

        initChecklistSliderHandler();
        $(window).on('resize', function() {
            initChecklistSliderHandler();
        });
    });  
});