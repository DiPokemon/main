$(document).ready(function () {
    $('.accordion__item').click(function () {
        $(this).toggleClass('open');
    });

    $('.header__burger').click(function (event) {
        $('.header__burger,.header__menu').toggleClass('active');
        $('body').toggleClass('lock')
    }); 

    if ($('window').width() <= 768) {
        $('.first_lvl_menu>.sub-menu>li>menu__link').click(function(event) {
            event.preventDefault();
        });
    };
    
      
  

    function setEqualHeight(columns){
        var tallestcolumn = 0;
        columns.each(
            function(){
                currentHeight = $(this).height();
                if(currentHeight > tallestcolumn){
                    tallestcolumn = currentHeight;
                }
            }
        );
        columns.attr('style','min-height:' + tallestcolumn + 'px');
    }
    $(document).ready(function() {
        setEqualHeight($(".offer_block-tariff-top"));
    });
    $(document).ready(function() {
        setEqualHeight($(".case_slide__title"));
    });    
});

document.addEventListener('DOMContentLoaded', function(){
    //LazyLoad for MAP
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
        }      
    };
}, false);

    