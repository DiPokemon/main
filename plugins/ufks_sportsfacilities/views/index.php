<div class="wrap">
	<h1 class="wp-heading-inline"><?= UFKS_SPORTSFACILITIES_PLUGIN_NAME_RU ?></h1>

	<a href="<?= UFKS_SPORTSFACILITIES_PLUGIN_ADMIN_URL . '&view=add' ?>" class="page-title-action">Добавить</a>

	<hr class="wp-header-end">

	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Название</th>
				<th>Адрес</th>
				<th>Телефон</th>
				<th>Широта</th>
				<th>Долгота</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="the-list">
		<?php
			$number = 0;
			foreach ( self::$model->get_list() as $item ): $number++; ?>
			<tr>
				<td><?= $item->title ?></td>
				<td><?= $item->address ?></td>
				<td><?= $item->phone ?></td>
				<td><?= $item->lat ?></td>
				<td><?= $item->lng ?></td>
				<td>
					<a href="<?= UFKS_SPORTSFACILITIES_PLUGIN_ADMIN_URL . '&view=edit&data_id=' . $item->id ?>">Редактировать</a>
					|
					<a href="<?= UFKS_SPORTSFACILITIES_PLUGIN_ADMIN_URL . '&action=delete&data_id=' . $item->id ?>">Удалить</a>
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