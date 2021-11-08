<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends FullController
{
    public function actionIndex()
    {
        $this->view->title = 'Один товар с категорией';
        $prod = Product::find()->with('category')->all();//с указанием названия связи для уменьшения кол-ва запросов (оптимизируем) НЕПОНЯТНО!!!
        return $this->render('index', compact('prod'));
    }
}