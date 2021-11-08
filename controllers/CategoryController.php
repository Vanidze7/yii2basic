<?php


namespace app\controllers;


use app\models\Category;

class CategoryController extends FullController
{
    public function actionIndex()
    {
        $this->view->title = 'Сопоставление';
        $cat = Category::find()->all();
        return $this->render('index', compact('cat'));
    }
    public function actionCatOne()//с GET не работает
    {
        $cat = Category::findOne(4);//функция применяется к Prymary key
        $prod = $cat->getProducts(850)->all();//дополняем связь модели
        $this->view->title = "Категория: {$cat->title}";
        return $this->render('Catone', compact('cat', 'prod'));
    }
}