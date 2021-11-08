<?php


namespace app\models;


use yii\db\ActiveRecord;

class Country extends ActiveRecord //для работы с базой данных
{
/*    public static function tableName()
    {
        //return 'имя таблицы с наименованием несовпадающем с моделью';
        //return '{{имя таблицы с наименованием несовпадающем с моделью}}';
        //return '{{%имя таблицы с предлогом}}';
    }
*/
    public function rules()
    {
        return [
            [['code', 'name', 'population', 'status'], 'required'],
            ['code', 'unique'],//уникальный валидатор
            ['population', 'integer'],//целое число
            ['status', 'boolean']//0 или 1
        ];
    }
    public function attributeLabels()
    {
        return [
            'code' => 'Код страны',
            'name' => 'Страна',
            'population' => 'Население',
            'status' => 'Статус'
        ];
    }
}