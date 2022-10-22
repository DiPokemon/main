<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = UFKS_PARTNERS_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = UFKS_PARTNERS_PLUGIN_ADMIN_URL . '&action=edit';


update_option(
	UFKS_PARTNERS_PLUGIN_NAME.'_media_selector_attachment_id',
	absint( self::$model->image_attachment_id )
);

// Save attachment ID
if ( isset( $_POST['submit'] ) && isset( $_POST['data_image_attachment_id'] ) ) {
	update_option(
		UFKS_PARTNERS_PLUGIN_NAME.'_media_selector_attachment_id',
		absint( $_POST['data_image_attachment_id'] )
	);
}

// Подключает все файлы необходимые для использования медиа API WordPress (окно загрузки и выбора файлов).
// Функция подключает скрипты, стили, настройки и шаблоны.
wp_enqueue_media();

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> партнера</h1>
	<a href="<?= UFKS_PARTNERS_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= $_GET['data_id'] ?>" >
		<?php endif ?>
		<table class="form-table">
		<tbody>
			<tbody>
			<tr>
				<th scope="row">
					<label for="name">Наименование</label>
				</th>
				<td>
					<input name="data_name" type="text" id="name" value="<?= self::$model->name ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="url">Ссылка на сайт</label>
				</th>
				<td>
					<input name="data_url" type="text" id="url" value="<?= self::$model->url ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label>Логотип</label>
				</th>
				<td>
					<div class='image-preview-wrapper'>
						<img id='image-preview' src='<?php echo self::$model->get_image_attachment_filepath(get_option( UFKS_PARTNERS_PLUGIN_NAME.'_media_selector_attachment_id' )) ?>' height='100'>
					</div>
					<input id="upload_image_button" type="button" class="button" value="Выбрать изображение" />
					<input type='hidden' name='data_image_attachment_id' id='image_attachment_id' value='<?php echo get_option( UFKS_PARTNERS_PLUGIN_NAME.'_media_selector_attachment_id' ); ?>'>
				</td>	
			</tr>
		</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>