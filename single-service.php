<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<div class="_container">
            <section class="page-header">
                <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
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
        </div>

<?php endwhile; ?>

<?php get_footer(); ?>