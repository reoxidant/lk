<?php

use yii\helpers\Html;

?>

<div class="col-md-12">
    <h2>Страница с формой!</h2>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id' => 'my-form',
        'enableClientValidation' => true, //false чтобы отключить валидацию
        'options' => [
            'class' => 'form-horizontal',
        ],
        'fieldConfig' => [
          'template' => "
                {label}\n
                <div class='col-md-5'>{input}</div>\n
                <div>{hint}</div>\n
                <div class='col-md-5'>{error}</div>",
            'labelOptions' => ['class' => 'col-md-2 control-label']
        ]
    ]) ?>
    <?= $form->field($model, 'name')->hint('Заполните поле!')->textInput(['placeholder' => 'Введите имя'])->label('Имя:'); ?>

    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите email']); ?>

    <?= $form->field($model, 'text', [
        'template' => "
                {label}\n
                
                <div class='col-md-5'>{input}</div>\n
                <div>{hint}</div>\n
                <div class='col-md-2'>Пример конфигурации шаблона поле для формы</div>
                <div class='col-md-3'>{error}</div>",
        'labelOptions' => ['class' => 'col-md-2 control-label']
    ])->textarea(['rows' => 7, 'placeholder' => 'Введите текст'])?>

    <div class="form-group">
        <div class="col-md-5 col-md-offset-2">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>
    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>