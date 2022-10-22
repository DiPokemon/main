<ul class="social">
<?php
	foreach ( self::$model->get_list() as $item ): ?>
        <li>
        	<a href="<?= $item->url ?>" title="<?= $item->name ?>" target="_blank"><img src="<?= self::$model->get_image_attachment_filepath($item->image_attachment_id) ?>"></a>
        </li>
<?php endforeach ?>
</ul>