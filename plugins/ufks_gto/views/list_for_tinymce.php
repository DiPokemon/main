<?php $length = 0 ?>
<div class="gto">
    <ul class="gto__documents">
        <?php foreach ( self::$model->get_list() as $item ): $length++ ?>
            <li class="gto__documents__item">
                <a href="<?= wp_get_attachment_url( absint( $item->attachment_id ) ) ?>" class="gto__documents__item__info"><?= get_the_title( absint( $item->attachment_id ) ) ?></a>
            </li>
        <?php endforeach ?>
    </ul>

    <?php if ($length < 1): ?>
    	<div class="empty-content">Документы отсутствуют</div>
    <?php endif ?>
</div>