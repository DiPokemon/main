<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = UFKS_DOCUMENTS_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = UFKS_DOCUMENTS_PLUGIN_ADMIN_URL . '&action=edit';

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> категории</h1>
	<a href="<?= UFKS_DOCUMENTS_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$modelCategories->id ?>" >
		<?php endif ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="name">Название</label>
					</th>
					<td>
						<input name="data_name" type="text" id="name" value="<?= self::$modelCategories->name ?>" class="regular-text">
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>
</div>