<?php


namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
        //return '{{имя таблицы с наименованием несовпадающем с моделью}}';
        //return '{{%имя таблицы с предлогом}}';
    }
    public function getProducts($price = 1000)//привязываем таблицу продукты
    {
        //привязываемая модель таблицы, [имя столбца привязываемой таблицы со столбцом данной модели] дополняем запрос
        return $this->hasMany(Product::class, ['category_id' => 'id'])->where('price < :price', [':price' => $price])->orderBy('price');
    }
}