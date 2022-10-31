<?php
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
