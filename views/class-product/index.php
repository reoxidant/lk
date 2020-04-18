<?php
if (is_array($class_products)):
    foreach ($class_products as $class):
        $i=1;
        ?>
        <h2><?= $class->title ?></h2>
        <table class="table"">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Год</th>
                <th scope="col">Цена</th>
            </tr>
        </thead>
            <? foreach ($class->getProducts()->all() as $product):?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $product->title?></td>
                    <td><?= $product->year?></td>
                    <td><?= $product->price?></td>
                </tr>
            <? endforeach;?>
        </table>
    <?
    endforeach;
else:
    debug($class_products);
endif;


?>