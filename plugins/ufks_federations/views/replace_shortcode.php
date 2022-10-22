<?php $length = 0 ?>
<?php
	foreach ( self::$model->get_list() as $item ): $length++ ?>
	<div class="card">
		<div class="card__image">
			<img src="<?= self::$model->get_image_attachment_filepath($item->image_attachment_id) ?>">
		</div>
		<div class="card__info">
			<p class="card__info__title"><?= $item->name ?></p>
			<div class="card__info__row">
  				<div class="card__info__row__title">
					<p class="card__info__">Руководитель:</p>
				</div>
  				<div class="card__info__row__value">
					<p class="card__info__text"><?= $item->chief_fullname ?></p>
				</div>
			</div>
			<div class="card__info__row">
  				<div class="card__info__row__title">
					<p class="card__info__">Адрес:</p>
				</div>
  				<div class="card__info__row__value">
					<p class="card__info__text"><?= $item->address ?></p>
				</div>
			</div>
			<div class="card__info__row">
  				<div class="card__info__row__title">
					<p class="card__info__">Телефон:</p>
				</div>
  				<div class="card__info__row__value">
					<p class="card__info__text"><?= $item->phone ?></p>
				</div>
			</div>
			<div class="card__info__row">
  				<div class="card__info__row__title">
					<p class="card__info__">Почта:</p>
				</div>
  				<div class="card__info__row__value">
					<p class="card__info__text"><?= $item->email ?></p>
				</div>
			</div>
			<div class="card__info__row">
  				<div class="card__info__row__title">
					<p class="card__info__">Ссылка на сайт:</p>
				</div>
  				<div class="card__info__row__value">
					<p class="card__info__text"><?= $item->site_url ?></p>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>

<?php if ($length < 1): ?>
    <div class="empty-content">Федерации отсутствуют</div>
<?php endif ?>