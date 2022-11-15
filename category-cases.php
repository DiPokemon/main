<?php get_header(); ?>
<div class="_container">
                <section class="page-header">
                    <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
                    <h1 class="page-header__title"><?php single_cat_title(); ?></h1>
                </section>                        
                
                <section class="category-list_description">
                    <div class="category-list_description__container _container">
                        <div class="category-list_description__text"><?php echo category_description();?></div>
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
                                            <div class="services-block__text"><?php the_title(); ?></div>
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
            
                

                <section class="page__service-selection service-selection">
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