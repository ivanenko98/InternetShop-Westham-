
    <div class="table-responsive" xmlns="http://www.w3.org/1999/html">
        <table class="table table-hover table-striped"
        <thead>
        <tr>
            <th>Назва</th>
            <th>Кіль-к</th>
            <th>Ціна</th>
            <th>Сумма</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach($session['cart'] as $id => $item):?>
            <tr>
                <td><?= \yii\helpers\Html::img("@web/images/product/{$item['image']}",
                        ['alt' => $item['name'], 'height' => 50]) ?></td>
                <td><?= $item['name']?></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Всього: </td>
            <td align="right"><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="3">На суму: </td>
            <td align="right"><?= $session['cart.sum'] ?></td>
        </tr>

        </tbody>
        </table>
    </div>
