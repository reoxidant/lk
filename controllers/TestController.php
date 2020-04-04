<?php


namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
//    public $defaultAction = 'my-test';
/*
    public function actions(){
        return [
            'test' => 'app\components\HelloAction'
        ];
    }
*/

    public function actionIndex($name = 'guest', $age = null){
//        var_dump($name, $age);
        return '<h1>Hello World!</h1>';
    }

    public function actionMyTest(){
        return __METHOD__;
    }
}