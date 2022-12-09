<?php get_header(); ?>

<div class="_container">
    <section class="page-header">
        <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>        
        <h1 class="page-header__title"><?php the_title(); ?></h1>
    </section>        
    
    <section>
        <div class="_container">
            <div class="page__contacts info_block">

                <div class="contacts_item">
                    <div class="contacts_item-icon"></div>
                    <div class="contacts_item-body">
                        <span class="contacts_item-title">Адрес</span>
                        <span class="contacts_item-text">Ростов-на-Дону,<br>ул. Стабильная 9</span>
                    </div>
                </div>

                <div class="contacts_item">
                    <div class="contacts_item-icon"></div>
                    <div class="contacts_item-body">
                        <span class="contacts_item-title">Телефон</span>
                        <span class="contacts_item-text">
                            <a href="tel:+79934481000">+7 993 448 1000</a>
                            <a href="tel:+79514976107">+7 951 497 61 07</a>
                            <a href="tel:+79614236307">+7 961 423 63 07</a>
                        </span>
                    </div>
                </div>

                <div class="contacts_item">
                    <div class="contacts_item-icon"></div>
                    <div class="contacts_item-body">
                        <span class="contacts_item-title">E-mail</span>
                        <span class="contacts_item-text">
                            <a href="mailto:sales@topland-rnd.ru">sales@topland-rnd.ru</a>
                        </span>
                    </div>
                </div>

                <div class="contacts_item">
                    <div class="contacts_item-icon"></div>
                    <div class="contacts_item-body">
                        <span class="contacts_item-title">Время работы</span>
                        <span class="contacts_item-text">
                            Пн - Пт: с 9.00 до 19.00<br>
                            Сб - Вс - выходной
                        </span>
                    </div>
                </div>

            </div>
            <div id="map_container" class="map container-fluid">   
                <script id="ymap_lazy" type="text/javascript" charset="utf-8" async data-src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A35c48d9808a50de74447c6d0ec48ba8b04881953d7f20f645b6e374170bb77f0&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>                                                    
            </div>
            <div class="page_contacts-text-block">
                <?php the_content(); ?>
            </div>
            <div class="page_contacts-form contact_form-row">
                <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>
            </div>
        </div>
    </section>         
</div>

<?php get_footer(); ?>