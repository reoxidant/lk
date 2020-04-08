<h1>Hello World!</h1>
<?= $this->render('inc')?>
<?= $this->render('//inc/test.html')?>
<p><?= $name ?></p>
<p><?= $age ?></p>
<p><?= $this->context->my_var?></p>
<p><?= $this->params['t1']?></p>

<p><? $this->params['t2'] = "T2 params"?></p>
<p><?= $this->params['t2']?></p>

<? $this->beginBlock('block1'); ?>

    <p><?= $this->params['t2']?></p>
    <p>...содержимое блока 1...</p>

<? $this->endBlock(); ?>