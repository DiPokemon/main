<div class="wrap">
	<h1 class="wp-heading-inline"><?= TOPLAND_YMAP_PLUGIN_NAME_RU ?></h1>

	<a href="<?= TOPLAND_YMAP_PLUGIN_ADMIN_URL . '&view=add' ?>" class="page-title-action">Добавить +</a>

	<hr class="wp-header-end">

	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Логотип</th>
				<th>Наименование</th>
				<th>Ссылка на сайт</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody id="the-list">
		<?php
			$number = 0;
			foreach ( self::$model->get_list() as $item ): $number++; ?>
			<tr>
				<td>
					<img src="<?= self::$model->get_image_attachment_filepath($item->image_attachment_id) ?>"
						width="32">
				</td>
				<td><?= $item->name ?></td>
				<td><a href="<?= $item->url ?>"><?= $item->url ?></a></td>
				<td>
					<a href="<?= TOPLAND_YMAP_PLUGIN_ADMIN_URL . '&view=edit&data_id=' . $item->id ?>">Редактировать</a>
					|
					<a href="<?= UFKS_SOCIAL_PLUGIN_ADMIN_URL . '&action=delete&data_id=' . $item->id ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach ?>

		<?php if ($number < 1): ?>
			<tr>
				<th colspan="4"><center>Пусто</center></th>
			</tr>
		<?php endif ?>
		</tbody>
	</table>

	<div class="tablenav bottom">
		<div class="tablenav-pages one-page"><span class="displaying-num"><?= $number ?> элемент(а/ов)</span></div>
		<br class="clear">
	</div>

</div>