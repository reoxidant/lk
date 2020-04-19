<?php

namespace app\controllers;

use app\models\ClassProduct;
use yii\web\NotFoundHttpException;

class ClassProductController extends AppController
{
    public function actionIndex()
    {
        $this->view->title = 'Products all classes';

        $class_products = ClassProduct::find()->all();

        return $this->render('index', compact('class_products'));
    }

    public function actionShowClass($id = null, $alias = null)
    {
        $class_products_id = ClassProduct::findOne($id);
        $class_products_alias = ClassProduct::findOne(['alias' => $alias]);

        if(is_null($class_products_id) and is_null($class_products_alias)){
            throw new NotFoundHttpException('Not exist this id class!');
        }

        $class_products =  (is_null($class_products_id)) ? $class_products_alias : $class_products_id;

        $this->view->title = "Class: ($class_products->title)";

        $products = $class_products->getProducts(50000)->all();

        return $this->render('show-class', compact('class_products', 'products'));
    }
}