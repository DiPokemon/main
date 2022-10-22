<?php
wp_enqueue_media();
?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= UFKS_DOCUMENTS_PLUGIN_NAME_RU ?></h1>

	<a href="<?= UFKS_DOCUMENTS_PLUGIN_ADMIN_URL . '&view=add' ?>" class="page-title-action">Добавить категорию</a>

	<hr class="wp-header-end">

	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Название</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="the-list">
		    <?php
            $categories = self::$modelCategories->get_list();
            foreach ( $categories as $category ): ?>
                <tr data-id="<?= $category->id ?>">
                    <td><?= $category->name ?></td>
                    <td>
                        <a href="#" class="upload-button">Добавить документ</a> |
                        <a href="<?= UFKS_DOCUMENTS_PLUGIN_ADMIN_URL . '&view=edit&data_id=' . $category->id ?>">Редактировать</a> |
                        <a href="<?= UFKS_DOCUMENTS_PLUGIN_ADMIN_URL . '&action=delete&data_id=' . $category->id ?>">Удалить</a>
                    </td>
                </tr>
                <?php foreach ( self::$model->get_list($category->id) as $document ): ?>
                    <tr>
                        <td style="padding-left: 30px;"><a href="<?= wp_get_attachment_url($document->attachment_id) ?>" target="_blank"><?= get_the_title($document->attachment_id) ?></a></td>
                        <td>
                            <a href="<?= UFKS_DOCUMENTS_PLUGIN_ADMIN_URL . '&action=delete_document&data_id=' . $document->id ?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach ?>
		    <?php endforeach ?>

		    <?php if ( sizeof( $categories ) < 1 ): ?>
			    <tr>
				    <th colspan="2"><center>Отсутствуют</center></th>
			    </tr>
		    <?php endif ?>
		</tbody>
	</table>
</div>

<form id="upload-form" method="post" action="<?= UFKS_DOCUMENTS_PLUGIN_ADMIN_URL . '&action=add_document' ?>">
    <input type="hidden" name="data_attachment_id" id="data_attachment_id">
    <input type="hidden" name="data_category_id" id="data_category_id">
</form>