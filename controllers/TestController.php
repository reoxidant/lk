<?php

namespace app\controllers;

use app\models\EntryForm;

class TestController extends AppController
{
    public function actionIndex($name = 'guest', $age = 25)
    {
        $this->layout = 'test';
        $this->view->title = "Test Page";
        $this->view->params['t1'] = 'T1 params';
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

        $model = new EntryForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            \Yii::$app->session->setFlash('success', 'Данные успешно отправлены Get запросом!');
            return $this->refresh();

            /*  if(\Yii::$app->request->isPjax){
                  \Yii::$app->session->setFlash('success', 'Данные успешно отправлены и приняты через Pjax!');
                  $model = new EntryForm();
              }else{
                  \Yii::$app->session->setFlash('success', 'Данные успешно отправлены Get запросом!');
                  return $this->refresh();
              }*/
        }

        return $this->render(
            'index',
            compact('model')
        );
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }
}