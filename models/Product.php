<?php


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
        //return '{{имя таблицы с наименованием несовпадающем с моделью}}';
        //return '{{%имя таблицы с предлогом}}';
    }
    public function getCategory()//привязываем таблицу категории
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']); //привязываемая модель таблицы, [имя столбца привязываемой таблицы с столбцом данной модели]
    }
}