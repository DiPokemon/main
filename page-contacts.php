<?php get_header(); ?>

<div class="_container">
    <section class="page-header">
        <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>        
        <h1 class="page-header__title"><?php the_title(); ?></h1>
    </section>        

    <section class="page__contacts">
        <div class="page__contacts__container _container">
            <div class="page__contacts__body">                
                <div class="page__contacts_text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="page__contacts-map contact_block">
        <div class="page__contacts__container _container">
            <div class="page__contacts_map-wrapper">                
                <div id="map_container" class="map container-fluid">   
                    <script id="ymap_lazy" type="text/javascript" charset="utf-8" async data-src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A35c48d9808a50de74447c6d0ec48ba8b04881953d7f20f645b6e374170bb77f0&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>                                                    
                </div>
                <div class="form">
                    <h3 class="form_title">У Вас остались вопросы</h3>
                    <p class="form_text">Заполните форму обратной связи и наш специалист перезвонит Вам и проконсультирует по любой, интересующей Вас теме.</p>
                    <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>

                </div>
            </div>
        </div>
    </section>        
</div>

<?php get_footer(); ?>