<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="col-md-12">
    <h2>Страница с формой!</h2>
    <?php $form = \yii\bootstrap\ActiveForm::begin()?>
        <?= $form->field($model, 'name');?>
        <?= $form->field($model, 'email');?>
        <?= $form->field($model, 'text')->textarea(['rows' => 3])?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-default'])?>
        </div>
    <?php \yii\bootstrap\ActiveForm::end()?>
</div>