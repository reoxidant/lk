<?php

namespace app\controllers;

use app\models\Country;
use app\models\EntryForm;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\ResponseFormatterInterface;
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

        //Получаем все данные, потом берем последний методом one. При оптимизации нужно сделать через метод limit
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

    public function actionCreateNewCountry()
    {
        $this->layout = 'test';
        $this->view->title = "Add new country to Database";

        $country = new Country();

        if (\Yii::$app->request->isAjax) {
            $country->load(\Yii::$app->request->post());
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($country->validate()) {
                return ['message' => "ok"];
            } else {
                return ActiveForm::validate($country);
            }
        }

        if ($country->load(\Yii::$app->request->post()) && $country->save()) {
            \Yii::$app->session->setFlash('success', 'OK');
            $country->refresh();
        }

        /*      $country->code = 'ES';
              $country->name = 'Spain';
              $country->population = 47007367;
              $country->status = 1;
        */
        /*        if($country->save()){
                    \Yii::$app->session->setFlash('success', 'OK');
                }else{
                    \Yii::$app->session->setFlash('danger', 'error');
                }*/

        return $this->render('create-new-country', compact('country'));
    }

    public function actionUpdate()
    {
        $this->layout = 'test';
        $this->view->title = 'Update Country';

        $country = Country::findOne('RU');
        if (!$country) {
            throw new NotFoundHttpException('Country not found!');
        }

        if ($country->load(\Yii::$app->request->post()) && $country->save()) {
            \Yii::$app->session->setFlash('success', 'ok');
            $country->refresh();
        }

        return $this->render('update', compact('country'));
    }

    public function actionDelete($code = '')
    {
        $this->layout = 'test';
        $this->view->title = 'Delete Country';

        $country = Country::findOne($code);

        if($country){
            if(false !== $country->delete()){
                \Yii::$app->session->setFlash('success', 'Country has been deleted');
            }else{
                \Yii::$app->session->setFlash('danger', 'Count not to delete that country');
            }
        }else{
            \Yii::$app->session->setFlash('danger', 'That country in not exist!');
        }


        return $this->render('delete', compact('country'));
    }
}