<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = TOPLAND_REVIEWS_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = TOPLAND_REVIEWS_PLUGIN_ADMIN_URL . '&action=edit';

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> менеджера</h1>
	<a href="<?= TOPLAND_REVIEWS_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$model->id ?>" >
		<?php endif ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="name">Имя</label>
					</th>
					<td>
						<input name="data_name" type="text" id="name" value="<?= self::$model->name ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="last_name">Фамилия</label>
					</th>
					<td>
						<input name="data_last_name" type="text" id="last_name" value="<?= self::$model->last_name?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="position">Должность</label>
					</th>
					<td>
						<input name="data_position" type="text" id="position" value="<?= self::$model->position ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="text">Текст</label>
					</th>
					<td>
						<textarea name="data_text" type="text" id="text" value="<?= self::$model->text ?>" class="regular-text"></textarea>
					</td>
				</tr>				
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>