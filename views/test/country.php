<div class="col-md-12">
    <h1>Тестовая модель бд Country</h1>

    <? if (is_object($countries)): ?>
        <table class="table">
            <?php foreach ($countries as $country): ?>
                <tr>
                    <td><?= $country->code ?></td>
                    <td><?= $country->name ?></td>
                    <td><?= $country->population ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <? elseif (is_array($countries)): ?>
        <table class="table">
            <?php foreach ($countries as $country): ?>
                <tr>
                    <td><?= $country['code'] ?></td>
                    <td><?= $country['name'] ?></td>
                    <td><?= $country['population'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <? else: ?>
        <table class="table">
            <tr>
                <td><?= $countries->code ?></td>
                <td><?= $countries->name ?></td>
                <td><?= $countries->population ?></td>
            </tr>
        </table>
    <? endif; ?>
</div>