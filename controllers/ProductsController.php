<?php

namespace app\controllers;

use app\models\Products;

class ProductsController extends AppController
{
    public function actionIndex()
    {
        $this->view->title = "All Products";

        $products = Products::find()->with('class')->all();

        return $this->render('index', compact('products'));
    }

    public function actionShowProduct($id = null){

        $product = Products::findOne($id);

        $this->view->title = "Product: ($product->title)";

        return $this->render('show-product', compact('product'));
    }
}