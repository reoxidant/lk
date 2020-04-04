<?php


namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        return '<h1>Hello World!</h1>';
    }
}