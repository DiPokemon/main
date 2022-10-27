<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

        <div itemscope itemtype="http://schema.org/Article" class="_container">
            <section class="page-header">
                <?php if ( function_exists( 'topland_breadcrumbs' ) ) topland_breadcrumbs(); ?>  
                <h1 itemprop="headline" class="page-header__title"><?php the_title(); ?></h1>
            </section>

            <section class="page__service-article">
                <div class="service-article__container _container">
                    <div class="service-article__body <?php post_class(); ?>">
                        <img class="service-article_img" src="<?php the_post_thumbnail_url('full') ?>">
                        <div itemprop="articleBody" class="service-article_text">
                                <?php the_content(); ?>
                        </div>
                        
                    </div>
                </div>
            </section>

            <!-- SchemaOrg  -->
            <meta itemprop="author" content="TopLand">
            <meta itemprop="datePublished" content="<?php echo get_the_date('j.m.Y'); ?>">
            <meta itemprop="dateModified" content="<?php the_modified_time('j.m.Y');?>">
            <meta itemprop="image" content="<?php the_post_thumbnail_url('full') ?>">
            <meta itemprop="articleSection" content="<? $category = get_the_category(); echo $category[0]->name;?> ">

            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <link itemprop="url" href="https://topland-rnd.ru/">
                <meta itemprop="name" content="TopLand">
                <meta itemprop="description" content="Маркетинговое агентство в Ростове-на-Дону">
                <meta itemprop="address" content="Ростов-на-Дону, ул. Стабильная 9">
                <meta itemprop="telephone" content="+79934536307">
                <div itemprop="logo" itemscope itemtype="https://www.schema.org/ImageObject">
                    <link itemprop="url" href="https://topland-rnd.ru/wp-content/uploads/2022/10/logo_min.png">
                    <link itemprop="contentUrl" href="https://topland-rnd.ru/wp-content/uploads/2022/10/logo_min.png">
		        </div>
	        </div>

        </div>

<?php endwhile; ?>

<?php get_footer(); ?>