    $(document).ready(function () {
        $('.reviews_slider').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true
        });

        $('.cases_slider').slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: true
        });
    });
