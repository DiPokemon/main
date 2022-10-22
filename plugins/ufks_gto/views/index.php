<?php
wp_enqueue_media();
?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= UFKS_GTO_PLUGIN_NAME_RU ?></h1>

    <a href="#" class="page-title-action upload-button">Добавить документ</a>

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
            $documents = self::$model->get_list();
            foreach ( $documents as $document ): ?>
                <tr>
                    <td style="padding-left: 30px;"><a href="<?= wp_get_attachment_url($document->attachment_id) ?>" target="_blank"><?= get_the_title($document->attachment_id) ?></a></td>
                    <td>
                        <a href="<?= UFKS_GTO_PLUGIN_ADMIN_URL . '&action=delete&data_id=' . $document->id ?>">Удалить</a>
                    </td>
                </tr>
		    <?php endforeach ?>

		    <?php if ( sizeof( $documents ) < 1 ): ?>
			    <tr>
				    <th colspan="2"><center>Отсутствуют</center></th>
			    </tr>
		    <?php endif ?>
		</tbody>
	</table>
</div>

<form id="upload-form" method="post" action="<?= UFKS_GTO_PLUGIN_ADMIN_URL . '&action=add' ?>">
    <input type="hidden" name="data_attachment_id" id="data_attachment_id">
</form>