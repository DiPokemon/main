<?php get_header(); ?>

<?php
/*
*Template name: Шаблон записи-услуги
*/
?>
<?php
# Получаем и записываем значения произвольных полей в переменные
$cloud_tags = get_field("cloud_tags", $term);
?>

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
                        
                        <section class="single-services-block">
                <div class="single-services-block__price">
                            <?php $service_price = get_field("service_price"); ?>
                            <?php if (!empty($service_price)): ?>
                                <div class="single_services-block__text-price">Цена от <?= $service_price ?> ₽</div>
                            
                            <div class="single_services-block__text"> <?php echo do_shortcode('[contact-form-7 id="2491" title="Контактная форма mini"]'); ?></div>
                            <?php endif;?>
                        </div> 
            </section>
           
                        
                        <div itemprop="description" class="service-article_text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>                

            <!-- SchemaOrg -->
            <div itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer">
                <meta content="<?= get_field("service_price"); ?>" itemprop="lowPrice"/>
                <meta content="RUR" itemprop="priceCurrency"/>
            </div>
        </div>

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

    


      
                
        
<?php endwhile; ?>

<?php get_footer(); ?>