$(document).ready(function () {
    $(function () {
        $("li.menu-item-has-children").on("click", "a", function (event) {
            $(window).width() > 768 || event.preventDefault()
        })
    });

    $('.accordion__item').click(function () {
        $(this).toggleClass('open');
    });

    $('.header__burger').click(function (event) {
        $('.header__burger,.header__menu').toggleClass('active');
        $('body').toggleClass('lock')
    }); 
});

    let map_container = document.getElementById('map_container');      
    let options_map = {          
        once: true,          
        passive: true,          
        capture: true      
    };      
    map_container.addEventListener('click', start_lazy_map, options_map);      
    map_container.addEventListener('mouseover', start_lazy_map, options_map);      
    map_container.addEventListener('touchstart', start_lazy_map, options_map);      
    map_container.addEventListener('touchmove', start_lazy_map, options_map);        
    let map_loaded = false;      
    function start_lazy_map() {          
        if (!map_loaded) {              
            let map_block = document.getElementById('ymap_lazy');              
            map_loaded = true;              
            map_block.setAttribute('src', map_block.getAttribute('data-src'));              
            map_block.removeAttribute('data-src');              
            console.log('YMAP LOADED');          
        }      
    };