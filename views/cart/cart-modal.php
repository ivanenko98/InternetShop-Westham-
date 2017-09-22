<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive" xmlns="http://www.w3.org/1999/html">
            <table class="table table-hover table-striped"
                   <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Назва</th>
                            <th>Кіль-к</th>
                            <th>Ціна</th>
                            <th class="aright">
                                <span  class="glyphicon glyphicon-remove" aria-hidden="true" ></span>
                            </th>
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
                <td align="right"><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td colspan="4">Всього: </td>
                <td align="right"><?= $session['cart.qty'] ?></td>
            </tr>
        <tr>
            <td colspan="4">На суму: </td>
            <td align="right"><?= $session['cart.sum'] ?></td>
        </tr>

        </tbody>
            </table>
    </div>
<?php else: ?>
    <h2>Корзина пуста</h2>
<?php endif; ?>