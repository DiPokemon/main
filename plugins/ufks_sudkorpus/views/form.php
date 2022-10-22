<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = UFKS_SUDKORPUS_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = UFKS_SUDKORPUS_PLUGIN_ADMIN_URL . '&action=edit';


update_option(
	UFKS_SUDKORPUS_PLUGIN_NAME.'_media_selector_attachment_id',
	absint( self::$model->image_attachment_id )
);

// Save attachment ID
if ( isset( $_POST['submit'] ) && isset( $_POST['data_image_attachment_id'] ) ) {
	update_option(
		UFKS_SUDKORPUS_PLUGIN_NAME.'_media_selector_attachment_id',
		absint( $_POST['data_image_attachment_id'] )
	);
}

// Подключает все файлы необходимые для использования медиа API WordPress (окно загрузки и выбора файлов).
// Функция подключает скрипты, стили, настройки и шаблоны.
wp_enqueue_media();

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> менеджера</h1>
	<a href="<?= UFKS_SUDKORPUS_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$model->id ?>" >
		<?php endif ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="order">№</label>
					</th>
					<td>
						<input name="data_order" type="number" id="order" value="<?= self::$model->order ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="name">ФИО</label>
					</th>
					<td>
						<input name="data_fullname" type="text" id="name" value="<?= self::$model->fullname ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="job_position">Должность</label>
					</th>
					<td>
						<input name="data_job_position" type="text" id="job_position" value="<?= self::$model->job_position ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="birth_date">Дата рождения</label>
					</th>
					<td>
						<input name="data_birth_date" type="text" id="birth_date" value="<?= self::$model->birth_date ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="image_attachment_id">Фотография</label>
					</th>
					<td>
						<div class='image-preview-wrapper'>
							<img id='image-preview' src='<?php echo self::$model->get_image_attachment_filepath( get_option( UFKS_SUDKORPUS_PLUGIN_NAME.'_media_selector_attachment_id' ) ); ?>' height='100'>
						</div>
						<input id="upload_image_button" type="button" class="button" value="Выбрать изображение" />
						<input type='hidden' name='data_image_attachment_id' id='image_attachment_id' value='<?php echo get_option( UFKS_SUDKORPUS_PLUGIN_NAME.'_media_selector_attachment_id' ); ?>'>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>
