<?php $i = 1; ?>
    <table class="table"">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Год</th>
        <th scope="col">Цена</th>
        <th scope="col">Категория</th>
    </tr>
    </thead>
<? foreach ($products as $product): ?>
    <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $product->title ?></td>
        <td><?= $product->year ?></td>
        <td><?= $product->price ?></td>
        <!--            <td>--><? //= $product->class->title?><!--</td>-->
    </tr>
<? endforeach; ?>
    </table>
<? ?>