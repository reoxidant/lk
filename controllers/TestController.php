<?php

namespace app\controllers;

use app\models\Country;
use app\models\EntryForm;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TestController extends AppController
{
    public function actionIndex($name = 'guest', $age = 25)
    {
        $this->layout = 'test';
        $this->view->title = "Test Page";
        $this->view->params['t1'] = 'T1 params';
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

        $model = new EntryForm();

        $model->load(Yii::$app->request->post());
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->validate()) {
                return ['message' => 'ok'];
            } else {
                return ActiveForm::validate($model);
            }
//            return ActiveForm::validate($model);
        }

        return $this->render('index', compact('model'));
    }

    public function actionCountry()
    {
        $this->layout = 'country';
        $this->view->title = "Тестовая модель бд Country";

        //Получение данных, строковый формат
//        $countries = Country::find()->all();
//        $countries = Country::find()->where("population < 100000000 AND code <> 'DE'")->all();

        //Защита от SQL инъекции, привязка параметров
        /*$countries = Country::find()->where(

            "population < :population AND code <> :code",
            [
                ':population' => 100000000,
                ':code' => 'DE'
            ]
        )->all();*/

        //Получение данных, формат массива
        /*$countries = Country::find()->where(
            [
                'code' => ['DE', 'FR', 'AU'],
                'status' => 1
            ]
        )->all();*/

        //Получение данных, Формат операторов
        /*$countries = Country::find()->where(
            ['like', 'name', 'ni']
        )->all();*/

//        $countries = Country::find()->orderBy('population DESC')->all();

        //Получаем число запись
//        $countries = Country::find()->count();
//        debug($countries, 1);

        //Получаем данные одной запись
//        $countries = Country::find()->limit(1)->where(['code' => 'RU'])->one();

        //Аналог функции Country::find()->all();
//        $countries = Country::findAll(['DE', 'RU', "CN"]);

        //Аналог функции Country::find()->one();
//        $countries = Country::findOne(['code' => 'DE', 'status' => 1]);

        //Экононмим память, выводя не обьет, а массив
        $countries = Country::find()->asArray()->all();

        return $this->render('country', compact('countries'));
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }
}