<?php


namespace app\components;


use yii\base\Widget;

class HelloWidget extends Widget
{
    public $name;

    public function init()//приемщик параметров widgeta
    {
        parent::init();
        if($this->name===null)
            $this->name = 'Гость';
        ob_start();//буферизация
    }

    public function run()//вывод содержимого widgeta
    {
        $content = ob_get_clean();//очищаем буфер, оставляя только содержимое виджета (begin - end)
        $content = strip_tags($content);
        //return "Привет $this->name $content";
        return $this->render('hello', ['name' => $this->name, 'content'=> $content]);
    }
}