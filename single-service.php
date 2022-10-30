<?php get_header(); ?>

<?php while (have_posts()) : the_post(); 
    $image_id = get_post_thumbnail_id();
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
    $image_title = get_the_title($image_id);
?>

        <div itemscope itemtype="http://schema.org/Product" class="_container">
            <section class="page-header">
                <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
                <h1 itemprop="name" class="page-header__title"><?php the_title(); ?></h1>
            </section>

            <section  class="page__service-article">
                <div class="service-article__container _container">
                    <div class="service-article__body <?php post_class(); ?>">
                        <img loading="lazy" itemprop="image" class="service-article_img" src="<?php the_post_thumbnail_url() ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>">
                        <div itemprop="description" class="service-article_text">
                            <?php the_content(); ?>
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

            <!-- SchemaOrg -->
            <div itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer">
                <meta content="<?php echo get_post_meta($post->ID, 'low_price', 1); ?>" itemprop="lowPrice"/>
                <meta content="RUR" itemprop="priceCurrency"/>
            </div>
        </div>

<?php endwhile; ?>

<?php get_footer(); ?>