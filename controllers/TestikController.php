<?php


namespace app\controllers;


use yii\web\View;

class TestikController extends FullController
{
    public $a = 17;
    public $b = 22;
    public $pershablon;
    //public $defaultAction = 'summa';//переназначить метод по умолчанию
    //public $layout = 'testik';//переназначаем шаблон для всего контролера (или для каждого отдельно смотри ниже)

    public function actions()
    {
        return [
            // действие testik перенаправляет на класс
            'testik' => 'app\components\HelloAction'
        ];
    }
    public function actionIndex ($name = 'Vano', $age = 20)//всегда public
    {
        $this->pershablon = 'DateContext';
        \Yii::$app->view->params['testdate1'] = 'Данные 1 из index контроллера Testik';//передаем данные в (вид и шаблон) глобальный массив params для действия index контролера Testik (можно укорочено через $this->view)
        //return $this->render('index', compact('name','age'));//аналогичный с нижним методом, с передачей данных через функцию
        \Yii::$app->view->on(View::EVENT_END_BODY, function () {
            echo "<p>&copy; Yii2 " . date("Y") . "</p>";});//при событии endBody совершает функцию. Зачем не понял?
        return $this->render('index', [//подключает шаблон(сайтбары, подвал, шапка) с видом, находящимся в views/"имя контролера(testik)"/"имя действия (Index)"
            'name' => $name,//передаем данные из контролера в вид, зачем то
            'age' => $age
        ]);
    }

    public function actionVid ()
    {
        $this->layout = 'testik';//переназначаем шаблон для данного действия
        //$this->view->title = 'TESTIK';//назначаем наименования страницы через контролер
        $this->view->registerMetaTag (['name' => 'description', 'content' => 'мето-описание'], 'description');//установка meta чего то там
        $this->view->params['testdate1'] = 'Данные 1 из vid контроллера Testik';
        return $this->render('vid');
    }
}