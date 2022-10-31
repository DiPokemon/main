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
                                    while ($query->have_posts()) {
                                        $query->the_post(); 
                                        if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url()))
                                            $post_thumbnail_url = get_template_directory_uri().'/static/empty-banner.gif';
                                        else
                                            $post_thumbnail_url = get_the_post_thumbnail_url();
                                        $image_id = get_post_thumbnail_id();
                                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                        $image_title = get_the_title($image_id);
                                        ?>
                                        <a class="articles__item" href="<?php the_permalink() ?>">
                                            <div class="articles__img"><img loading="lazy" src="<?= $post_thumbnail_url ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>"></div>
                                            <div class="articles__title"><h3 class="articles__title_h3"><?php the_title() ?></h3></div>
                                            <div class="articles__text"><?php the_excerpt() ?></div>
                                        </a>                                         
                                        <?php 
                                    }                                                                        
                                }	
                                ?>  
                                
                            </div>
                            
                            <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                                <script>
                                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                                </script>
                                <div id="true_loadmore">Загрузить ещё</div>
                            <?php endif; ?>
                            <!-- <div id="loadmore" style="text-align:center;"><a href="#" class="button">Загрузить ещё</a></div>  -->
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