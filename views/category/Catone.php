<h4><?= $cat->title ?></h4>
<?php foreach($cat->products as $product): ?>
    <p><?= $product->title?> | <?= $product->price?></p>
    <hr>
<?php endforeach;?>
<?php foreach($prod as $product): ?>
    <p><?= $product->title?> | <?= $product->price?></p>
    <hr>
<?php endforeach;?>
