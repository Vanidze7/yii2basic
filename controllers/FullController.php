<?php


namespace app\controllers;


use yii\web\Controller;

class FullController extends Controller//для создания общих переменных и функций для всех действий, видов, шаблонов
{
    public $pershablon;

    public function __construct($id, $module, $config = [])
    {
        //$this->pershablon = 12345;
        parent::__construct($id, $module, $config);
    }
}