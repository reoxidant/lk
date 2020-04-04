<?php


namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public $defaultAction = 'my-test';

    public function actionIndex(){
        return '<h1>Hello World!</h1>';
    }

    public function actionMyTest(){
        return __METHOD__;
    }
}