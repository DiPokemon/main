<?php get_header(); ?>
<div class="_container">
                <section class="page-header">
                    <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
                    <h1 class="page-header__title"><?php single_cat_title(); ?></h1>
                </section>

                <section class="page__blog-block services">
                    <div class="blog-block__container _container">
                        <div class="blog-block__body">
                            <div class="blog-block__grid">
                                <?php
                                    $category = get_queried_object();
                                    $query = new WP_Query(
                                        array(
                                            'post_type'      => 'post', 
                                            'post_status'    => 'publish', 
                                            'posts_per_page' => 3, 
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
                                        <a class="articles__item" href="<?php the_permalink() ?>">
                                            <div class="articles__img"><img src="<?= $post_thumbnail_url ?>" title="<?php the_title() ?>" alt="img"></div>
                                            <div class="articles__title"><h3 class="articles__title_h3"><?php the_title() ?></h3></div>
                                            <div class="articles__text"><?php the_excerpt() ?></div>
                                        </a>
                                         
                                        <?php 
                                    }
                                    ?>	
                                    
                                    <?php 
                                }	
                                ?>  
                                
                            </div>
                            <div id="loadmore" style="text-align:center;"><a href="#" class="button">Загрузить ещё</a></div> 
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