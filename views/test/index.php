<?php


use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

?>

<div class="col-md-12">
    <h2>Страница с формой!</h2>

    <?php Pjax::begin();?>

    <?php if(Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times</span>
            </button>
            <?= Yii::$app->session->getFlash('success')?>
        </div>
    <?php endif;?>

    <?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'enableClientValidation' => true, //false чтобы отключить валидацию
        'options' => [
            'class' => 'form-horizontal',
            'data-pjax' => true
        ],
        'fieldConfig' => [
          'template' => "
                {label}\n
                <div class='col-md-5'>{input}</div>\n
                <div>{hint}</div>\n
                <div class='col-md-5'>{error}</div>",
            'labelOptions' => ['class' => 'col-md-2 control-label']
        ]
    ]); ?>
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
    <?php ActiveForm::end(); ?>
    <?php Pjax::end() ?>
</div>