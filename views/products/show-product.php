<h2><?= $product->class->title ?></h2>
<table class="table"">
<thead>
<tr>
    <th scope="col">#</th>
    <th scope="col">Заголовок</th>
    <th scope="col">Год</th>
    <th scope="col">Цена</th>
</tr>
</thead>
<tr>
    <th scope="row">1</th>
    <td><?= $product->title ?></td>
    <td><?= $product->year ?></td>
    <td><?= $product->price ?></td>
</tr>
</table>