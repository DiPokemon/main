<div class="wrap">
	<h1 class="wp-heading-inline"><?= TOPLAND_REVIEWS_PLUGIN_NAME_RU ?></h1>

	<a href="<?= TOPLAND_REVIEWS_PLUGIN_ADMIN_URL . '&view=add' ?>" class="page-title-action">Добавить</a>

	<hr class="wp-header-end">

	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Должность</th>
				<th>Текст</th>				
				<th></th>
			</tr>
		</thead>
		<tbody id="the-list">
		<?php
			$number = 0;
			foreach ( self::$model->get_list() as $item ): $number++; ?>
			<tr>
				<td><?= $item->name ?></td>
				<td><?= $item->last_name ?></td>
				<td><?= $item->position ?></td>
				<td><?= $item->text ?></td>				
				<td>
					<a href="<?= TOPLAND_REVIEWS_PLUGIN_ADMIN_URL . '&view=edit&data_id=' . $item->id ?>">Редактировать</a>
					|
					<a href="<?= TOPLAND_REVIEWS_PLUGIN_ADMIN_URL . '&action=delete&data_id=' . $item->id ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach ?>

		<?php if ($number < 1): ?>
			<tr>
				<th colspan="6"><center>Отсутствуют</center></th>
			</tr>
		<?php endif ?>
		</tbody>
	</table>

	<div class="tablenav bottom">
		<div class="tablenav-pages one-page"><span class="displaying-num"><?= $number ?> элемент(а/ов)</span></div>
		<br class="clear">
	</div>

</div>