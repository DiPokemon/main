<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = UFKS_SPORTSFACILITIES_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = UFKS_SPORTSFACILITIES_PLUGIN_ADMIN_URL . '&action=edit';

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> менеджера</h1>
	<a href="<?= UFKS_SPORTSFACILITIES_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$model->id ?>" >
		<?php endif ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="title">ФИО</label>
					</th>
					<td>
						<input name="data_title" type="text" id="title" value="<?= self::$model->title ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="address">Должность</label>
					</th>
					<td>
						<input name="data_address" type="text" id="address" value="<?= self::$model->address ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="phone">Телефон</label>
					</th>
					<td>
						<input name="data_phone" type="text" id="phone" value="<?= self::$model->phone ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="lat">Широта</label>
					</th>
					<td>
						<input name="data_lat" type="text" id="lat" value="<?= self::$model->lat ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="lng">Долгота</label>
					</th>
					<td>
						<input name="data_lng" type="text" id="lng" value="<?= self::$model->lng ?>" class="regular-text">
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>