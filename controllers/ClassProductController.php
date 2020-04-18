<?php

namespace app\controllers;

use app\models\ClassProduct;

class ClassProductController extends AppController
{
    public function actionIndex()
    {
        $this->view->title = 'Products all classes';

        $class_products = ClassProduct::find()->all();

        return $this->render('index', compact('class_products'));
    }

    public function actionShowClass($id = null)
    {
        $class_products = ClassProduct::findOne($id);
        $this->view->title = "Class: ($class_products->title)";
        return $this->render('show-class', compact('class_products'));
    }
}