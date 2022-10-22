<div class="wrap">
	<h1 class="wp-heading-inline"><?= UFKS_MANAGEMENT_PLUGIN_NAME_RU ?></h1>

	<a href="<?= UFKS_MANAGEMENT_PLUGIN_ADMIN_URL . '&view=add' ?>" class="page-title-action">Добавить</a>

	<hr class="wp-header-end">

	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Аватарка</th>
				<th>ФИО</th>
				<th>Должность</th>
				<th>Телефон</th>
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
						width="100">
				</td>
				<td><?= $item->fullname ?></td>
				<td><?= $item->job_position ?></td>
				<td><?= $item->phone ?></td>
				<td>
					<a href="<?= UFKS_MANAGEMENT_PLUGIN_ADMIN_URL . '&view=edit&data_id=' . $item->id ?>">Редактировать</a>
					|
					<a href="<?= UFKS_MANAGEMENT_PLUGIN_ADMIN_URL . '&action=delete&data_id=' . $item->id ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach ?>

		<?php if ($number < 1): ?>
			<tr>
				<th colspan="5"><center>Отсутствуют</center></th>
			</tr>
		<?php endif ?>
		</tbody>
	</table>

	<div class="tablenav bottom">
		<div class="tablenav-pages one-page"><span class="displaying-num"><?= $number ?> элемент(а/ов)</span></div>
		<br class="clear">
	</div>

</div>