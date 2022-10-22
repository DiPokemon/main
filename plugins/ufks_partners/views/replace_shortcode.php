<div class="partners">
<?php
	foreach ( self::$model->get_list() as $item ): ?>
    <a href="<?= $item->url ?>" target="_blank">
    	<img src="<?= self::$model->get_image_attachment_filepath($item->image_attachment_id) ?>" title="<?= $item->name ?>">
    </a>
<?php endforeach ?>
</div>