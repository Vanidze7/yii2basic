<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="col-md-12">
    <h1>Работа с базой данных</h1>
    <table class="table">

        <?php /*foreach ($sql as $stolb):
            <tr>
                <td><?= $stolb->code ?></td>
                <td><?= $stolb->name ?></td>
                <td><?= $stolb->population ?></td>
            </tr>
        <?php endforeach */
        /*foreach ($sql as $stolb):
            <tr>
                <td><?= $stolb['code'] ?></td>
                <td><?= $stolb['name'] ?></td>
                <td><?= $stolb['population'] ?></td>
            </tr>
        endforeach //для asArray */?>
    </table>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif;
    /*
    $form = ActiveForm::begin([
        'id' => 'form-country',//задаем свойста формы
        'fieldConfig' => [//задаем свойства полей
            'options' => ['class' => 'form-group row'],
            'template' => "{label} \n <div class='col-md-4'>{input}</div> \n <div class='col-md-7'>{hint}</div> \n <div class='col-md-4 offset-md-1'>{error}</div>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
        ]
    ]);
    //echo $form->field($create, 'code', ['enableAjaxValidation' => true]); //включение Ajax валидации к полю первичного ключа
    echo $form->field($update, 'name');
    echo $form->field($update, 'population');
    echo $form->field($update, 'status')->checkbox([], false) ?>
    <div class="form-group row">
        <div class="col-md-4 offset-md-1">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end()*///форма для CREATE и UPDATE?>

</div>