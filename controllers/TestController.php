<?php

namespace app\controllers;
use yii\web\View;

class TestController extends AppController
{
    public $my_var;
    public $layout = 'test';

    public function actionIndex($name = 'guest', $age = 25)
    {
        $this->my_var = 'My Variable';
        $this->view->title = "Test Page";
        //\Yii::$app->view->params['t1'] = 'T1 params';
        $this->view->params['t1'] = 'T1 params';
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

        \Yii::$app->view->on(View::EVENT_END_BODY, function(){
           echo "<p>&copy; My test controller and layout current year ".date("Y")."</p>";
        });

        return $this->render(
            'index',
            compact('name', 'age')
        );
    }

    public function actionMyTest(){
        return $this->render('my-test');
    }
}