<h1>Сопоставление таблиц</h1>
<?php foreach ($prod as $prod_stroka): ?>
<p><?= $prod_stroka->title?> | <?= $prod_stroka->price?> | Category: <?= $prod_stroka->category->title?></p>
<?php endforeach?>

