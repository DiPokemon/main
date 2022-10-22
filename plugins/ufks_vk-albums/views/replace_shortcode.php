<div id="vk-albums" class="photos-cover">
	<?php foreach (self::$model->get_list_of_albums()->items as $album):

		if ($album->id < 0)
			continue;

		$cover = null;

		foreach ($album->sizes as $size) {
			if ($size->type == 'x') {
				$cover = $size->src;
				break;
			}
		}

	?>
		<a class="photos-cover__item photos-cover__item-50-percent" href="/photo-album-detail/<?= $album->id ?>">
			<img src="<?= $cover ?>">
			<div class="photos-cover__item__title"><span><?= $album->title ?><span></div>
		</a>
	<?php endforeach ?>
</div>