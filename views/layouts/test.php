<?

use yii\helpers\Html;

$this->beginPage();

\app\assets\TestAssets::register($this);
?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <? $this->registerCsrfMetaTags(); ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <? $this->beginBody() ?>

    <div class="container">
        <div class="row">
            <?= $content ?>
        </div>
    </div>

    <? $this->endBody() ?>
    </body>
    </html>
<? $this->endPage(); ?>