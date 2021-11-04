<?php $this->title = 'MAIN' ?>
<h2>Шляпа конская, но работает</h2>
<!-- $this->render('//testik/vid')//подключаем файл(типа подключаем header)-->
<p><?= $name ?></p><!--используем переданные данные из контролера, зачем то -->
<p><?= $age ?></p>
<p><?= $this->context->pershablon ?></p><!--используем переданные данные из контролера, зачем то -->
<p><?= $this->params['testdate1'] ?></p><!-- используем данные из контролера в виде, через глобальный массив params-->
<?php $this->params['testdate2'] = 'Данные 2 из index' ?><!--передаем данные в глобальный массив params-->
<?php $this->params['testdate3'] = 'Данные 3 из index' ?>
<p><?= $this->params['testdate2'] ?></p><!-- используем данные из глобального массива params-->
<?php $this->beginBlock ('Block1') ?><!-- передаем блок данных-->
<p>Данные блока</p>
<p><?= $this->params['testdate3'] ?></p>
<?php $this->endBlock () ?>
<p><?= $this->blocks['Block1'] ?></p>
<?php
$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);//подключили js файл с jquery для данного вида
$this->registerCssFile('@web/css/styles.css');//подключили css файл для данного вида
