<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

        <div class="_container">
            <section class="page-header">
                <div class="page-header__breadcrumbs">Главная / Услуги / SEO</div>
                <h1 class="page-header__title"><?php the_title(); ?></h1>
            </section>

            <section class="page__service-article">
                <div class="service-article__container _container">
                    <div class="service-article__body <?php post_class(); ?>">
                        <img class="service-article_img" src="<?php the_post_thumbnail_url() ?>">
                        <div class="service-article_text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>

<?php endwhile; ?>

<?php get_footer(); ?>