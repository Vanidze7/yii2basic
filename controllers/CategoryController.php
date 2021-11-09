<?php


namespace app\controllers;


use app\models\Category;
use yii\web\NotFoundHttpException;

class CategoryController extends FullController
{
    public function actionIndex()
    {
        $this->view->title = 'Сопоставление';
        $cat = Category::find()->all();
        return $this->render('index', compact('cat'));
    }
    public function actionCatOne($id = null)//с GET работает при установки правил в web
    {
        $cat = Category::findOne($id);//функция применяется к Prymary key
        if(!$cat)
            throw new NotFoundHttpException('id не найден');
        $prod = $cat->getProducts(850)->all();//дополняем связь модели
        $this->view->title = "Категория: {$cat->title}";
        return $this->render('Catone', compact('cat', 'prod'));
    }
}