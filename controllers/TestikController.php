<?php


namespace app\controllers;


use app\models\Country;
use app\models\EntryForm;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\View;
use yii\widgets\ActiveForm;

class TestikController extends FullController
{
    public $a = 17;
    public $b = 22;
    public $pershablon;
    //public $defaultAction = 'summa';//переназначить метод по умолчанию
    //public $layout = 'testik';//переназначаем шаблон для всего контролера (или для каждого отдельно смотри ниже)

    public function actions()
    {
        return [
            // действие testik перенаправляет на класс
            'testik' => 'app\components\HelloAction'
        ];
    }
    public function actionIndex ($name = 'Vano', $age = 20)//всегда public
    {
        $this->pershablon = 'DateContext';
        \Yii::$app->view->params['testdate1'] = 'Данные 1 из index контроллера Testik';//передаем данные в (вид и шаблон) глобальный массив params для действия index контролера Testik (можно укорочено через $this->view)
        //return $this->render('index', compact('name','age'));//аналогичный с нижним методом, с передачей данных через функцию
        \Yii::$app->view->on(View::EVENT_END_BODY, function () {
            echo "<p>&copy; Yii2 " . date("Y") . "</p>";});//при событии endBody совершает функцию. Зачем не понял?
        return $this->render('index', [//подключает шаблон(сайтбары, подвал, шапка) с видом, находящимся в views/"имя контролера(testik)"/"имя действия (Index)"
            'name' => $name,//передаем данные из контролера в вид, зачем то
            'age' => $age
        ]);
    }

    public function actionVid ()
    {
        $this->layout = 'testik';//переназначаем шаблон для данного действия
        //$this->view->title = 'TESTIK';//назначаем наименования страницы через контролер
        $this->view->registerMetaTag (['name' => 'description', 'content' => 'мето-описание'], 'description');//установка meta чего то там


        $exemp = new EntryForm();

        if($exemp->load(\Yii::$app->request->post()) && $exemp->validate()) {//если данные загружены в модель из поста и прошли валидацию
            if (\Yii::$app->request->isPjax) {//если через Pjax
                \Yii::$app->session->setFlash('success', 'Данные приняты Через Pjax, сучка!');//флеш сообщение
                $exemp = new EntryForm();//очищаем форму
            }else{
                \Yii::$app->session->setFlash('success', 'Данные приняты стандартно, сучка!');//флеш сообщение
                return $this->refresh();
            }
        }

        return $this->render('vid', compact('exemp'));//передаем экземпляр модели в шаблон
    }
    public function actionView ($code = '') {//не работает GET

        $this->layout = 'testik';
        $this->view->title = 'country';
        /*
        //$sql = Country::find()->where("`population` < 100000000 AND `code` != 'AU'")->all();//строчный формат запроса
        //$sql = Country::find()->where("`population` < :population AND `code` != :code", [':population' => 100000000, ':code' => 'AU'])->all();//безопасный вариант с использованием маркеров

        $sql = Country::find()->where([
            'code' => ['AU', 'GB', 'FR'],
            'status' => 1
            ])->all();
        //формат массива
        //$sql = Country::find()->where(['LIKE', 'name', 'ni'])->all();//формат операторов
        //$sqlik = 'SELECT * FROM country WHERE status=:status';//ручной запрос
        //$sql = Country::findBySql($sqlik, [':status' => 1])->all();
        //$sql = Country::find()->orderBy('population DESC')->all();//с сортировкой
        //$sql = Country::find()->count();//кол-во
        //$sql = Country::findAll(['AU', 'GB', 'FR']);//массив скалярных значений. Так же через указание ключей массива ['status' => 1]
        //$sql = Country::find()->asArray()->all();//возвращает массив а не объект
        *///SELECT

        /*
//        $create = new Country();//создаем объект модели, для дальнейшего создания записи в базе данных
//        $create->code = 'CZ';//топорный пример
//        $create->name = 'Czech';
//        $create->population = '10700000';
//        $create->status = '1';
//
//        if($create->save())
//            \Yii::$app->session->setFlash('success', 'Создано');
//        else
//            \Yii::$app->session->setFlash('error', 'Не Создано');
//
//        if(\Yii::$app->request->isAjax) {//если данные пришли через Ajax, загружаем их в модель, возвращаем результат валидации данных
//            $create->load(\Yii::$app->request->post());
//            \Yii::$app->response->format = Response::FORMAT_JSON;
//            return ActiveForm::validate($create);
//        }
//        if($create->load(\Yii::$app->request->post()) && $create->save()) {//загрузили из post и обновили (создали) данные в базе (с валидацией)
//            \Yii::$app->session->setFlash('success', 'Создано');
//            return $this->refresh();
//        }
        *///CREATE

        /*
        $update = Country::findOne('RU');//достаем запись для дальнейшего обновления
        if(!$update)
            throw new NotFoundHttpException('code не найден');//если запись не найдена, выведится страница ошибки (site/error)
        if($update->load(\Yii::$app->request->post()) && $update->save()) {//загрузили из post и обновили (создали) данные в базе (с валидацией)
            \Yii::$app->session->setFlash('success', 'Обновлено');
            return $this->refresh();
        }
        *///UPDATE

        /*
        $delete = Country::findOne($code);//достаем запись для дальнейшего удаления
        if (isset($_GET['code'])) {
            if (!$delete)
                throw new NotFoundHttpException('Данные не найдены');//если запись не найдена, выведится страница ошибки (site/error)
            else {
                $delete->delete();
                \Yii::$app->session->setFlash('success', 'Удалено');
            }
        }
        *///DELETE

        return $this->render('view', compact('delete'));
    }
}