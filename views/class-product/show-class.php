     <?$counter = 1;?>
    <h2><?= $class_products->title ?></h2>
    <table class="table"">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Год</th>
        <th scope="col">Цена</th>
    </tr>
    </thead>
    <? foreach ($class_products->products as $product):?>
        <tr>
            <th scope="row"><?=$counter++ ?></th>
            <td><?= $product->title?></td>
            <td><?= $product->year?></td>
            <td><?= $product->price?></td>
        </tr>
    <? endforeach;?>
    </table>
