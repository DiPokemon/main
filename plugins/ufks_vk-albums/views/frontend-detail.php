<?php get_header(); ?>

<div id="vk-album-detail" class="photos-cover">
	<?php $aid = $wp->query_vars['photo-album-detail']; ?>
	<?php foreach (self::$model->get_list_of_photos_by_album_id($aid)->items as $photo): ?>
		<a class="photos-cover__item photos-cover__item-33-percent" href="<?= $photo->photo_1280 ?>" data-fancybox="gallery" data-type="image" data-caption="<?= $photo->text ?>">
			<img src="<?= $photo->photo_604 ?>">
		</a>
	<?php endforeach ?>
</div>
<?php get_footer();