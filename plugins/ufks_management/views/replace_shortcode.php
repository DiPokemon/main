<?php $length = 0 ?>
<?php
	foreach ( self::$model->get_list() as $item ): $length++ ?>
	<div class="card">
		<div class="card__image">
			<img src="<?= self::$model->get_image_attachment_filepath($item->image_attachment_id) ?>">
		</div>
		<div class="card__info">
			<p class="card__info__title"><?= $item->fullname ?></p>
			<p class="card__info__under-title"><?= $item->job_position ?></p>
			<div class="card__info__row">
  				<div class="card__info__row__title">
					<p class="card__info__">Телефон:</p>
				</div>
  				<div class="card__info__row__value">
					<p class="card__info__text"><?= $item->phone ?></p>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>

<?php if ($length < 1): ?>
    <div class="empty-content">Данные отсутствуют</div>
<?php endif ?>