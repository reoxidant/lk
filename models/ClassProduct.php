<?php

namespace app\models;

use yii\db\ActiveRecord;

class ClassProduct extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%class_products}}';
    }

    public function getProducts($price = 100000)
    {
        return $this->hasMany(Products::class, ['class_id' => 'id'])->where('price < :price', [':price' => $price])->orderBy('price DESC');
    }
}