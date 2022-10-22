<?php $categories_length = 0 ?>
<?php foreach ( self::$modelCategories->get_list() as $category ): $categories_length++; $docs_in_category_length = 0 ?>
    <div class="category">
        <div class="category__info"><?= $category->name ?></div>
        <ul class="category__documents">
            <?php foreach ( self::$model->get_list( $category->id ) as $item ): $docs_in_category_length++ ?>
                <li class="category__documents__item">
                    <a href="<?= wp_get_attachment_url( absint( $item->attachment_id ) ) ?>" class="category__documents__item__info"><?= get_the_title( absint( $item->attachment_id ) ) ?></a>
                </li>
            <?php endforeach ?>
        </ul>

        <?php if ($docs_in_category_length < 1): ?>
            <div class="category__empty">Категория пустая</div>
        <?php endif ?>        
    </div>
<?php endforeach ?>

<?php if ($categories_length < 1): ?>
    <div class="empty-content">Документы отсутствуют</div>
<?php endif ?>