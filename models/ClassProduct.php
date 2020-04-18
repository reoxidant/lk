<?php

namespace app\models;

use app\models;
use yii\db\ActiveRecord;

class ClassProduct extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%class_products}}';
    }

    public function getProducts()
    {
        return $this->hasMany(Products::class, ['class_id' => 'id']);
    }
}