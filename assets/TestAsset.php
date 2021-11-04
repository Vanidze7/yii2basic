<?php


namespace app\assets;


use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    //public $sourcePath = '@app/components';//указание папки с ресурсами (пространство имен @app/Папка)
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/styles.css',
    ];
    public $js = [
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',//подключает jquery
        'yii\bootstrap4\BootstrapPluginAsset',//подключает библиотеку бутстрап
    ];
}