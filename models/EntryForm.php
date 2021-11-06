<?php


namespace app\models;


use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $text;
    public $topic;

    public function rules()//валидация передаваемых данных - обязательна, иначе yii2 считает данные не безопасными
    {
        return [
            [['name', 'email', 'text'], 'required'],//4 поля с обязательным заполнением (валидатор required)
            ['email', 'email'],//валидатор email
//            ['topic', 'required', 'message' => 'Пиши тему Beach!'],//изменение текста ошибки для конкретного поля
//            ['topic', 'string', 'min' => 2, 'tooShort' => 'Короткий хуй!'],//можно применять несколько валидаторов
//            ['topic', 'string', 'max' => 10, 'tooLong' => 'Длинный хуй!'],
            ['topic', 'validateSimvol', 'skipOnEmpty' => false]
        ];
    }
    public function validateSimvol($attribute, $params)//собственный валидатор
    {
        if (!in_array($this->$attribute, ['Такая', 'Не такая'])) {//если в передаваемом массиве отсутствуют данные значения то ошибка
            $this->addError($attribute, 'Не суй сюда эту хуйню');
        }
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',//даем наименования нашим полям (по атрибутам)
            'email' => 'Мыло',
            'text' => 'Текстик',
            'topic' => 'Тема'
        ];
    }
}