<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%products}}';
    }

    public function getClass()
    {
        return $this->hasOne(ClassProduct::class, ['id' => 'class_id']);
    }
}