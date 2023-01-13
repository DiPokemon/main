$(document).ready(function () {
    $('.slider_wrapper').each(function (index, sliderWrap) {
        var $slider_reviews = $(sliderWrap).find('.reviews_slider');
        var $tariff_slider = $(sliderWrap).find('.tariff_slider');
        var $slider_cases = $(sliderWrap).find('.cases_slider');
        var $main_slider = $(sliderWrap).find('.main-slider');
        var $guarantee_slider = $(sliderWrap).find('.guarantee_slider');
        var $techno_slider = $(sliderWrap).find('.techno_slider');
        var $work_area = $(sliderWrap).find('.work_area_slider');
        var $cloud_tags = $(sliderWrap).find('.cloud_tag_slider');
        var $tags = $(sliderWrap).find('.tags_slider');
        var $next = $(sliderWrap).find('.slide-m-next');
        var $prev = $(sliderWrap).find('.slide-m-prev');
        var $dots = $(sliderWrap).find('.slide-m-dots');        

        $tariff_slider.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },                
            ],
        });

        $techno_slider.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },  
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },  

                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                
            ],
        });

        $work_area.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 850,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 2,                        
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ],
        });

        $tags.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 850,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 2,                        
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ],
        });

        $slider_reviews.slick({
            autoplay: true,
            dots: true,
            nextArrow: $next,
            prevArrow: $prev,
            appendDots: $dots,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1          
        });

        $main_slider.slick({   
            autoplay: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
        });
        
        $slider_cases.slick({
            autoplay: true,
            dots: true,
            nextArrow: $next,
            prevArrow: $prev,
            adaptiveHeight: true,
            appendDots: $dots,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 460,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ],
        });

        $guarantee_slider.slick({   
            autoplay: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            responsive: [
                {
                    breakpoint: 850,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 2,                        
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ],
        });

        $cloud_tags.slick({   
            autoplay: true,
            dots: false,
            arrows: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 460,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ],
        });

        
    }); 
});
