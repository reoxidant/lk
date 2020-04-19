<?php

namespace app\controllers;

use app\models\Country;
use app\models\EntryForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TestController extends AppController
{
    public function actionIndex($alert = "", $name = 'guest', $age = 25)
    {
        $this->layout = 'test';
        $this->view->title = "Test Page";
        $this->view->params['t1'] = 'T1 params';
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

        $model = new EntryForm();


        switch ($alert) {
            case 'error':
                \Yii::$app->session->setFlash('error', 'Error');
                break;
            case "success":
                \Yii::$app->session->setFlash('success', "OK");
                break;
            case "info":
                \Yii::$app->session->setFlash('info', "Info");
                break;
            case "warning":
                \Yii::$app->session->setFlash('warning', "Warning");
                break;
            default:
                \Yii::$app->session->setFlash('danger', "Danger");
        }

        return $this->render('index', compact('model'));
    }

    public function actionCountry()
    {
        $this->layout = 'country';
        $this->view->title = "Тестовая модель бд Country";

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

        if ($country) {
            if (false !== $country->delete()) {
                \Yii::$app->session->setFlash('success', 'Country has been deleted');
            } else {
                \Yii::$app->session->setFlash('danger', 'Count not to delete that country');
            }
        } else {
            \Yii::$app->session->setFlash('danger', 'That country in not exist!');
        }

        return $this->render('delete', compact('country'));
    }
}