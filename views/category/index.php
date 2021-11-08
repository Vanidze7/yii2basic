<h1>Сопоставление таблиц</h1>
<?php foreach ($cat as $cat_stroka): ?>
    <h4><?= $cat_stroka->title ?></h4>
    <?php foreach($cat_stroka->products as $product): //примени функцию products (из модели) на строку - получим массив товаров из привязанной таблицы?>
        <p><?= $product->title?> | <?= $product->price?></p>
        <hr>
    <?php endforeach;?>
<?php endforeach?>

