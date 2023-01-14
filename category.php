<?php get_header(); ?>
<?php
    $term = get_queried_object();
    $top_text = get_field("top_text", $term);
    $cases_text   = get_field("cases_text", $term);
    $tariffs_text    = get_field("tariffs_text", $term);
    $after_posts_title = get_field("after_post_list_title", $term);
    $after_posts_text = get_field("after_post_list_text", $term);
    $steps_block_title = get_field("steps_title", $term);
    $steps = get_field("step", $term);    
    $after_guarantee_title = get_field("after_guarantee_title", $term);
    $after_guarantee_text = get_field("after_guarantee_text", $term);
    $after_guarantee_img = get_field("after_guarantee_img", $term);
    $specialists = get_field("specialists", $term);
    $tags = get_field("tags", $term);
    $cloud_tags = get_field("cloud_tags", $term);
?>
<div class="_container">
                <section class="page-header">
                    <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
                    <h1 class="page-header__title"><?php single_cat_title(); ?></h1>

                    <div class="category_top-text">
                            <?= $top_text ?>
                    </div>
                </section>
                
                

                <section section="page__service-offer">
                    <div class="tariffs-block__container">                            
                        <div class="tariffs-block__title">
                            <h2 class="_h2">Тарифы</h2>
                        </div>
                        <?php if (!empty($tariffs_text)): ?>
                            <div class="tariffs_text service_text-block">
                                <?= $tariffs_text ?>
                            </div>
                        <?php endif;?> 
                        <div class="slider_wrapper">
                            <div class="tariff_slider">
                                <?php echo do_shortcode('[topland_tariffs]'); ?>
                            </div>
                        </div>                        
                    </div> 
                </section>

                <section class="form_row">
                    <div class="page_contacts-form contact_form-row">
                        <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>
                    </div>
                </section>

                <section class="page__services-block services">
                    <div class="services-block__container _container">
                        <div class="services-block__body">
                            <div class="services-block__grid">
                                <?php
                                    $category = get_queried_object();
                                    $query = new WP_Query(
                                        array(
                                            'post_type'      => 'post', 
                                            'post_status'    => 'publish', 
                                            'posts_per_page' => -1, 
                                            'cat'            => $category->cat_ID
                                        )
                                    );
                                if ($query->have_posts()) {
                                ?>                                
                                <?php 
                                    while ($query->have_posts()) {
                                        $query->the_post(); 
                                        if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url()))
                                            $post_thumbnail_url = get_template_directory_uri().'/static/empty-banner.gif';
                                        else
                                            $post_thumbnail_url = get_the_post_thumbnail_url();
                                        ?>
                                         <a class="services-block__item" href="<?php the_permalink(); ?>">
                                            <div class="service-block_left">
                                                <div class="service-block-top">
                                                   <div class="services-block__text"><?php the_title(); ?></div>
                                                    <div class="services-block__desc"><?php the_excerpt(); ?></div> 
                                                </div>                                                
                                                <?php $service_price = get_field("service_price"); ?>
                                                <?php if (!empty($service_price)): ?>
                                                    <div class="services-block__text-price">От <?= $service_price ?> ₽</div>
                                                <?php endif;?>
                                            </div>                                            
                                            <div class="services-block__img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Frame 1.svg" alt="<?php the_title(); ?>"></div>

                                        </a>  
                                        <?php 
                                    }
                                    ?>	                                
                                    <?php 
                                }	
                                ?> 
                            </div>
                        </div>
                        
                    </div>
                </section>

                <?php if (!empty($after_posts_text)): ?>                
                    <section>
                        <div class="_container">
                            <div>
                                <h2 class="_h2 section_title"><?= $after_posts_title ?></h2>
                            </div>                        
                            <div class="cases_text service_text-block">
                                <?= $after_posts_text ?>
                            </div>                            
                        </div>                
                    </section>
                <?php endif;?>

                <?php if($steps): ?>
                    <section>
                        <div class="_container">
                            <div>
                                <h2 class="_h2 section_title"><?= $steps_block_title ?></h2>
                            </div> 
                            <div class="accordion">
                                
                                    <?php $i=0; ?>
                                    <?php foreach($steps as $step): ?>                                    
                                        <input type="checkbox" name="chacor" id="step_<?= $i; ?>" />
                                        <label for="step_<?= $i; ?>"><?= $step['step_title'] ?></label>
                                        <div class="acor-body">
                                            <?= $step['step_text'] ?>
                                        </div>
                                        <?php $i++ ?>
                                    <?php endforeach ?>
                                    
                               
                                
                            </div>
                        </div>
                    </section>  
                <?php else : ?>
   
                <?php endif; ?>

                <section>
                    <div class="_container">
                        <div>
                        <h2 class="_h2 section_title">Наши гарантии</h2>
                        </div>
                        <div class="slider_wrapper">
                        <div class="guarantee_slider">

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-hand-holding-usd"></i></div>
                            <div class="guarantee_text">Оплата за результат</div>
                            </div>
                            
                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-clipboard-check"></i></div>
                            <div class="guarantee_text">Заключение договора</div>
                            </div>

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-users"></i></div>
                            <div class="guarantee_text">Команда специалистов</div>
                            </div>

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-thumbs-up"></i></div>
                            <div class="guarantee_text">Белые методы продвижения</div>
                            </div>

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-desktop"></i></div>
                            <div class="guarantee_text">Улучшение юзабилити сайта</div>
                            </div>

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-funnel-dollar"></i></div>
                            <div class="guarantee_text">Повышение конверсии сайта</div>
                            </div>

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-route"></i></div>
                            <div class="guarantee_text">Четкая стратегия развития проекта</div>
                            </div>
                            
                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="far fa-eye"></i></div>
                            <div class="guarantee_text">Прозрачная отчетность</div>
                            </div>

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-shield-alt"></i></div>
                            <div class="guarantee_text">Безопасносность</div>
                            </div>

                            <div class="guarantee_item">
                            <div class="guarantee_icon"><i class="fas fa-handshake"></i></div>
                            <div class="guarantee_text">Индивидуальный подход</div>
                            </div>

                        </div>
                        </div>
                        
                    </div>
                </section>

                <section class="page__service-offer">                                      
                    <div class="cases-block__container">
                        <div class="cases-block__body">
                            <div class="cases-block__title">
                                <h2 class="_h2">Кейсы</h2>
                            </div>
                            <?php if (!empty($cases_text)): ?>
                                <div class="cases_text service_text-block">
                                    <?= $cases_text ?>
                                </div> 
                            <?php endif;?>
                            <div class="slider_wrapper">
                                <div class="cases_slider">
                                    <?php $length_cases = 0 ?>
                                    <?php
                                        $args_for_cases = [
                                            'posts_per_page' => -1,
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
                                            $image_id = get_post_thumbnail_id();
                                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                            $image_title = get_the_title($image_id);
                                    ?>
                                        <a class="cases-block__slide case_slide" href="<?php the_permalink() ?>">
                                            <div class="case_slide_wrapper">
                                            <img loading="lazy" src="<?= $post_thumbnail_url ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>">
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
                                              
                </section>

                <section class="category-list_description">
                    <div class="category-list_description__container _container">
                        <div class="category-list_description__text"><?php echo category_description();?></div>
                    </div>
                </section>

                <section class="form_row">
                    <div class="page_contacts-form contact_form-row">
                        <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>
                    </div>
                </section>

                <section>
              <div class="_container">
                <div>
                  <h2 class="_h2 section_title">Сферы, с которыми мы работаем</h2>
                </div>
                <div class="slider_wrapper">
                  <div class="work_area_slider">

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/fitnes.png" alt=""></div>
                      <div class="work_area_text">Фитнес</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/zastroy.png" alt=""></div>
                      <div class="work_area_text">Застройщики</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/bank.png" alt=""></div>
                      <div class="work_area_text">Банки</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/nedvizh.png" alt=""></div>
                      <div class="work_area_text">Недвижимость</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/turizm_icon.png" alt=""></div>
                      <div class="work_area_text">Туризм</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/uslugi_icon.png" alt=""></div>
                      <div class="work_area_text">Услуги</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/int-mag.png" alt=""></div>
                      <div class="work_area_text">Интернет-магазин</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/landing.png" alt=""></div>
                      <div class="work_area_text">Лендинг</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/car.png" alt=""></div>
                      <div class="work_area_text">Автомобили</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/salon_icon.png" alt=""></div>
                      <div class="work_area_text">Салон красоты</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/uristi.png" alt=""></div>
                      <div class="work_area_text">Юридические услуги</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/furniture.png" alt=""></div>
                      <div class="work_area_text">Мебель</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/med.png" alt=""></div>
                      <div class="work_area_text">Медицина</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/jewelry.png" alt=""></div>
                      <div class="work_area_text">Ювелирные изделия</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/konsalting.png" alt=""></div>
                      <div class="work_area_text">Консалтинг</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/books.png" alt=""></div>
                      <div class="work_area_text">Книги</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/news.png" alt=""></div>
                      <div class="work_area_text">Новости</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/building-company.png" alt=""></div>
                      <div class="work_area_text">Стройматериалы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/kosmetika.png" alt=""></div>
                      <div class="work_area_text">Косметика</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/strahovanie.png" alt=""></div>
                      <div class="work_area_text">Страховые компании</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/auto-salon.png" alt=""></div>
                      <div class="work_area_text">Автосалоны</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/kafe.png" alt=""></div>
                      <div class="work_area_text">Кафе, рестораны</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/hotel.png" alt=""></div>
                      <div class="work_area_text">Гостиницы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/flower_icon.png" alt=""></div>
                      <div class="work_area_text">Цветы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/supermarket.png" alt=""></div>
                      <div class="work_area_text">Продукты</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/logistic.png" alt=""></div>
                      <div class="work_area_text">Транспорт</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/odezhda.png" alt=""></div>
                      <div class="work_area_text">Одежда</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/kompany.png" alt=""></div>
                      <div class="work_area_text">Производства</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/farmer.png" alt=""></div>
                      <div class="work_area_text">Сельхозтехника</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/tipografiya.png" alt=""></div>
                      <div class="work_area_text">Типография</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/apteka.png" alt=""></div>
                      <div class="work_area_text">Аптеки</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/korporativnij.png" alt=""></div>
                      <div class="work_area_text">Корпоративные сайты</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/portals.png" alt=""></div>
                      <div class="work_area_text">Порталы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/b2b.png" alt=""></div>
                      <div class="work_area_text">E-Commerce</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/stroy.png" alt=""></div>
                      <div class="work_area_text">Строительство</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/stom.png" alt=""></div>
                      <div class="work_area_text">Стоматология</div>
                    </div>
                  </div>
                </div>
              </div>
            </section>               

                <?php if (!empty($after_guarantee_text)): ?>
                    <section>
                        <div class="_container">
                            <div class="text_wrapper">
                                <div class="half_column">
                                    <h2 class="_h2 section_title"><?= $after_guarantee_title ?></h2>
                                    <div class="cases_text service_text-block">
                                        <?= $after_guarantee_text ?>
                                    </div>
                                </div>
                                <div class="half_column">
                                    <img src="<?= $after_guarantee_img ?>" alt="<?= $after_guarantee_title ?>">
                                </div>
                            </div>
                        </div>  
                    </section>
                <?php endif;?>
                
                <?php if($specialists): ?>                    
                    <section>
                        <div class="_container">
                            <div>
                                <h2 class="_h2 section_title">Наши специалисты</h2>
                            </div> 
                            <div class="staff_wrapper">
                                <?php foreach($specialists as $specialist):?>
                                    <div class="staff_item">
                                        <h3 class="staff_name"><?= $specialist["specialist"] ?></h3>                                        
                                    </div> 
                                <?php endforeach; ?>                                
                            </div>  
                        </div>
                    </section>  
                <?php endif; ?>

                <?php if (!empty($cloud_tags)): ?>
                    <section class="cloud_tag-section ">
                        <div class="cloud_tag-container _container">                
                            <div class="cloud_tag-block__body"> 
                                <div class="cloud_tag_slider">
                                    <?php $i=0; ?>
                                    <?php foreach($cloud_tags as $tag): ?>   
                                        <div class="cloud_tag-slide">
                                            <span class="cloud_tag_link"><?= $tag['tag_text'] ?></span>
                                        </div>
                                        <?php $i++ ?>
                                    <?php endforeach ?>
                                </div>  
                            </div>
                        </div>
                    </section>
                <?php endif;?> 


                <section id="lightning_contact_form" class="page__service-selection service-selection">
                    <div class="service-selection__container _container">
                        <div class="service-selection__body">                        
                            <div class="service-selection__lightning_left">
                                <img class="lightning_left" loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Light_left.svg" alt="lightning left">
                            </div>
                            <div class="service-selection__content">         
                                <div class="service-selection__title">
                                    <h2 class="_h2 service-selection__title_h2 section_title">Не знаете какую услугу выбрать?</h2>
                                </div>
                                <div class="service-selection__subtitle toplend">Напишите нам. Мы подскажем какая услуга принесет вашей компании больше прибыли</div>
                                <div class="page_contacts-form contact_form-grid">
                                    <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>
                                </div>
                                <!-- <div class="service-selection__button">
                                    <a class="service-selection__href" href="https://wa.me/79934536307">Написать в What’sApp</a>
                                </div> -->
                            </div>
                            <div class="service-selection__lightning_right">
                                <img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Light_right.svg" alt="lightning right">
                            </div>                        
                        </div>
                    </div>
                </section>

                

            </div>
<?php get_footer(); ?>