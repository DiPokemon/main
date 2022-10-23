$(document).ready(function () {
    $('.accordion__item').click(function () {
        $(this).toggleClass('open');
    });
});

$(document).ready(function () {
    $('.header__burger').click(function (event) { 
        $('.header__burger,.header__menu').toggleClass('active');
        $('main').toggleClass('lock')
    })
});