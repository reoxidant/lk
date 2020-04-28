<div class="col-md-12">
    <div class="col-md-5 col-md-offset-2">
        <h2><?= $this->title ?></h2>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times</span>
                </button>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>


        <?php if (Yii::$app->session->hasFlash('danger')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times</span>
                </button>
                <?= Yii::$app->session->getFlash('danger') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-12">

    </div>
</div>