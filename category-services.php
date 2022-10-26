<?php get_header(); ?>
<div class="_container">
                <section class="page-header">
                    <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
                    <h1 class="page-header__title"><?php single_cat_title(); ?></h1>
                </section>

                <section class="page__service-offer">
                    <div class="offer_block-wrapper">
                        <div class="offer_block-text">
                            ТЕКСТ
                        </div>
                        <div class="offer_block-form">
                            ФОРМА
                        </div>
                    </div>

                    <div class="cases-block__container">
                        <div class="cases-block__body">
                        <div class="cases-block__title">
                            <h2 class="_h2 cases-block__title_h2">Кейсы</h2>
                        </div>

                        <div class="slider_wrapper">

                            <div class="cases_slider">

                                <?php $length_cases = 0 ?>
                                <?php
                                    // Взять первые 3 новости для горизонтальной ленты
                                    $args_for_cases = [
                                        'posts_per_page' => 9,
                                        'category_name'  => 'cases',
                                        'offset'         => 0,
                                    ];

                                    $query_cases = new WP_Query( $args_for_cases );

                                    while ($query_cases->have_posts()) :
                                        $query_cases->the_post();
                                        $length_cases++;

                                        if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url()))
                                            $post_thumbnail_url = get_template_directory_uri().'/static/empty-banner.gif';
                                        else
                                            $post_thumbnail_url = get_the_post_thumbnail_url();

                                ?>
                                    <a class="cases-block__slide case_slide" href="<?php the_permalink() ?>">
                                        <div class="case_slide_wrapper">
                                        <img src="<?= $post_thumbnail_url ?>" alt="<?php the_title() ?>">
                                        <div class="case_slide_title_wrapper">
                                            <h3 class="case_slide__title"><?php the_title() ?></h3>
                                        </div>                                
                                        </div>                              
                                    </a>

                                <?php endwhile; wp_reset_query(); ?>  

                            </div>
                            <div class="slider-controls">
                                <button type="button" class="slide-m-prev"></button>
                                <div class="slide-m-dots"></div>
                                <button type="button" class="slide-m-next"></button>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="offer_block-wrapper">
                        <div class="offer_block-tariff">
                            <h3 class="tariff_title">Тариф 1</h3>  
                            <p class="tariff_desc">Для того-то</p>  
                            <p class="tariff_price">от <span>999 999</span> ₽</p>
                            <div class="tariff_list">
                                <ul>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                </ul>                                
                            </div>
                            <a href="#" class="btn order_btn">Заказать</a>
                        </div>
                        <div class="offer_block-tariff">
                            <h3 class="tariff_title">Тариф 1</h3>  
                            <p class="tariff_desc">Для того-то</p>  
                            <p class="tariff_price">от <span>999 999</span> ₽</p>
                            <div class="tariff_list">
                                <ul>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                </ul>                                
                            </div>
                            <a href="#" class="btn order_btn">Заказать</a>   
                        </div>
                        <div class="offer_block-tariff">
                            <h3 class="tariff_title">Тариф 1</h3>  
                            <p class="tariff_desc">Для того-то</p>  
                            <p class="tariff_price">от <span>999 999</span> ₽</p>
                            <div class="tariff_list">
                                <ul>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                    <li>Пункт</li>
                                </ul>                                
                            </div>
                            <a href="#" class="btn order_btn">Заказать</a>       
                        </div>
                    </div>
                </section>

                <section class="page__services-block services">
                    <div class="services-block__container _container">
                        <div class="services-block__body">
                            <div class="services-block__grid">
                                <?php
                                    // получаем информацию о запрашиваемом объекте, у нас это категория:
                                    $queried_object = get_queried_object(); 
                                    // следующая строчка полезна при работе с произвольными таксономиями:
                                    // $taxonomy = $queried_object->taxonomy; // в нашем случае 'category'
                                    // получаем дочерние категории:
                                    $child_cats = get_categories(array(
                                    'taxonomy' => 'category',
                                    'child_of' => $queried_object->term_id
                                    ));
                                    if(count($child_cats)){  
                                    // выводим ссылки на дочерние категории:
                                    foreach ($child_cats as $key => $cat) { ?>
                                        <div class="services-block__item">
                                            <div class="services-block__text">
                                                <a href="<?php echo get_category_link($cat->cat_ID);?>"><?php echo $cat->name; ?></a>
                                            </div>
                                            <div class="services-block__img"><img src="<?php echo get_template_directory_uri()?>/static/img/Frame 1.svg" alt="img"></div>
                                        </div>                                                                               
                                        <?php 
                                        }
                                    }
                                ?>                                
                            </div>
                        </div>
                    </div>
                </section>
            
                <section class="category-list_service-selection">
                    <div class="service-selection__container _container">
                        <div class="service-selection__body">
                            <div class="service-selection__title">
                                <h2 class="_h2 service-selection__title_h2">Не знаете какую услугу выбрать?</h2>
                            </div>
                            <div class="service-selection__subtitle toplend">Напишите нам. Мы подскажем какая услуга
                                принесет вашей компании больше прибыли</div>
                            <div class="service-selection__button">
                                <a class="service-selection__href" href="#">Написать в What’sApp</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="category-list_description">
                    <div class="category-list_description__container _container">
                        <div class="category-list_description__text"><?php echo category_description();?></div>
                    </div>
                </section>

            </div>


<?php get_footer(); ?>