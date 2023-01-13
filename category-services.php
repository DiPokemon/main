<?php get_header(); ?>

<?php
/*
*Template name: Категория-услуг
*/
?>

<?php
# Получаем текущий термин таксономии
$term = get_queried_object();

# Получаем и записываем значения произвольных полей в переменные
$top_text = get_field("top_text", $term);
$cases_text   = get_field("cases_text", $term);
$tariffs_text    = get_field("tariffs_text", $term);
$cloud_tags = get_field("cloud_tags", $term);
?>
<div class="_container">
                <section class="page-header">
                    <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
                    <h1 class="page-header__title"><?php single_cat_title(); ?></h1>
                </section>
                
                <section section="page__service-offer">
                    <div class="tariffs-block__container">                            

                        <!-- <div class="tariffs-block__title">
                            <h2 class="_h2">Тарифы</h2>
                        </div> -->
                        <?php if (!empty($tariffs_text)): ?>
                            <div class="tariffs_text service_text-block">
                                <?= $tariffs_text ?>
                            </div>
                         <?php endif;?> 
                        <!--<div class="slider_wrapper">
                            <div class="tariff_slider">
                                <?php echo do_shortcode('[topland_tariffs]'); ?>
                            </div>
                        </div>                         -->
                    </div> 
                </section>

                <section class="page__services-block services">
                    <div class="services-block__container _container">
                        <div class="services-block__body">
                            <div class="services-block__grid">
                                <?php
                                    $queried_object = get_queried_object(); 
                                    $child_cats = get_categories(array(
                                    'taxonomy' => 'category',
                                    'child_of' => $queried_object->term_id
                                    ));
                                    if(count($child_cats)){  
                                    foreach ($child_cats as $key => $cat) { ?>
                                        <a class="services-block__item" href="<?php echo get_category_link($cat->cat_ID);?>">
                                            <div class="services-block__text">
                                                    <?php echo $cat->name; ?>
                                                </div>
                                                <div class="services-block__img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Frame 1.svg" alt="img"></div>
                                        </a>                                                                             
                                        <?php 
                                        }
                                    }
                                ?>                                
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="page__service-offer">
                    <div class="offer_block-top">
                        <div class="offer_block-text">
                            <?= $top_text ?>
                        </div>
                        <div class="offer_block-form">
                           <div class="page_contacts-form contact_form-row">
                                <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>
                            </div>
                        </div>
                        
                    </div>
                     
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
                                        'meta_key' => 'tax_position',
                                        'orderby' => 'tax_position',
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