
<a class="articles__item" href="<?php the_permalink() ?>">
    <div class="articles__img"><img loading="lazy" src="<?= $post_thumbnail_url ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>"></div>
    <div class="articles__title"><h3 class="articles__title_h3"><?php the_title() ?></h3></div>
    <div class="articles__text"><?php the_excerpt() ?></div>
</a> 
