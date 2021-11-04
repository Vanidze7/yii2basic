<?php use app\assets\AppAsset;
use yii\bootstrap4\Html;

$this->beginPage();//для чего то?

AppAsset::register($this);
//\app\assets\TestAsset::register($this)//опубликовали ресурсы из непубличной папки(не web)
?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>"><!-- установка языка -->
<head>
    <meta charset="<?= Yii::$app->charset ?>"><!-- установка кодировки -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?><!-- установка проверятеля токенов (что форма пришла с нашего сайта) защитник в общем -->
    <title><?= Html::encode($this->title) ?></title><!-- установка наименования страницы -->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <div class="row">
        <?= $content ?>
        <p><?= $this->context->pershablon ?></p>
        <!--<p><?= $this->params['testdate1'] ?></p>-->
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
