<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'TESTIK'

?>
<div class="col-md-12">
    <h2>Страница с формой</h2>

    <?php Pjax::begin() //функция обновления части страницы?>

    <?php if (Yii::$app->session->hasFlash('success')): //вывод флеш сообщения удачной отправки данных?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif;?>

    <?php $form = ActiveForm::begin([
            'id' => 'my-form',//задаем свойста формы
            'options' => [
                'data' => ['pjax' => true]],//настройка активации функции pjax
            'fieldConfig' => [//задаем свойства полей
                'options' => ['class' => 'form-group row'],
                'template' => "{label} \n <div class='col-md-4'>{input}</div> \n <div class='col-md-7'>{hint}</div> \n <div class='col-md-4 offset-md-1'>{error}</div>",
                'labelOptions' => ['class' => 'col-md-1 control-label'],
            ]
    ]) ?>
        <?= $form->field($exemp, 'name')/*->hint('Заполните поле')*/->textInput(['placeholder' => 'Введите имя'])//->label('Имя')//назначаем имя ?>

        <?= $form->field($exemp, 'email')->input('email',['placeholder' => 'Введите email']) ?>

        <?= $form->field($exemp, 'topic')->textInput(['placeholder' => 'Тема сообщения']) ?>

        <?= $form->field($exemp, 'text')->textarea(['rows' => 4, 'placeholder' => 'Введите текст'])//с указанием типа и кол-вом строк ?>

        <div class="form-group row">
            <div class="col-md-4 offset-md-1">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

    <?php ActiveForm::end() ?>
    <?php Pjax::end() ?>
</div>



