$(document).ready(function () {
    $('.slider_wrapper').each(function (index, sliderWrap) {
        var $slider_reviews = $(sliderWrap).find('.reviews_slider');
        var $slider_cases = $(sliderWrap).find('.cases_slider');
        var $next = $(sliderWrap).find('.slide-m-next');
        var $prev = $(sliderWrap).find('.slide-m-prev');
        var $dots = $(sliderWrap).find('.slide-m-dots');
        // var $dots = $(sliderWrap).find('.slide-m-dots');
        

        $slider_cases.slick({
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
                }
            ]
        });

        $slider_reviews.slick({
            dots: true,
            nextArrow: $next,
            prevArrow: $prev,
            adaptiveHeight: true,
            appendDots: $dots,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    });    



        //  $('.reviews_slider').slick({
        //      slidesToShow: 1,
        //      slidesToScroll: 1,
        //  });

        // $('.cases_slider').slick({
        //     dots: true,
        //     infinite: true,
        //     slidesToShow: 3,
        //     slidesToScroll: 1,
        //     adaptiveHeight: true,
        //     responsive: [
        //         {
        //             breakpoint: 768,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 1,
        //                 infinite: true,
        //                 dots: true
        //             }
        //         },
        //         {
        //             breakpoint: 460,
        //             settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1
        //             }
        //         } 
        //     ]
        // });
    });
