<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = UFKS_FEDERATIONS_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = UFKS_FEDERATIONS_PLUGIN_ADMIN_URL . '&action=edit';


update_option(
	UFKS_FEDERATIONS_PLUGIN_NAME.'_media_selector_attachment_id',
	absint( self::$model->image_attachment_id )
);

// Save attachment ID
if ( isset( $_POST['submit'] ) && isset( $_POST['data_image_attachment_id'] ) ) {
	update_option(
		UFKS_FEDERATIONS_PLUGIN_NAME.'_media_selector_attachment_id',
		absint( $_POST['data_image_attachment_id'] )
	);
}

// Подключает все файлы необходимые для использования медиа API WordPress (окно загрузки и выбора файлов).
// Функция подключает скрипты, стили, настройки и шаблоны.
wp_enqueue_media();

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> федерации</h1>
	<a href="<?= UFKS_FEDERATIONS_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$model->id ?>" >
		<?php endif ?>
		<table class="form-table">
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
						<label for="address">Адрес</label>
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
						<label for="email">Почта</label>
					</th>
					<td>
						<input name="data_email" type="text" id="email" value="<?= self::$model->email ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="site_url">Ссылка на сайт</label>
					</th>
					<td>
						<input name="data_site_url" type="text" id="site_url" value="<?= self::$model->site_url ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="chief_fullname">ФИО руководителя</label>
					</th>
					<td>
						<input name="data_chief_fullname" type="text" id="chief_fullname" value="<?= self::$model->chief_fullname ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="image_attachment_id">Фотография</label>
					</th>
					<td>
						<div class='image-preview-wrapper'>
							<img id='image-preview' src='<?php echo self::$model->get_image_attachment_filepath(self::$model->image_attachment_id) ?>' height='100'>
						</div>
						<input id="upload_image_button" type="button" class="button" value="Выбрать изображение" />
						<input type='hidden' name='data_image_attachment_id' id='image_attachment_id' value='<?php echo get_option( UFKS_FEDERATIONS_PLUGIN_NAME.'_media_selector_attachment_id' ); ?>'>
					</td>	
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>