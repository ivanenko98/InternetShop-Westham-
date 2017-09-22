<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap;

?>

<?php

use yii\bootstrap\Modal;

Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '
            <button type="button" class="btn btn-danger" onclick="clearCart()">Очистити корзину</button>
            <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-primary">Оформити замовлення</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Продовжити покупки</button>'
]);
Modal::end();

?>

<div class="container" style="margin-top: 10px; margin-bottom: 10px;">

    <?php

    if(Yii::$app->session->hasFlash('success')) : ; // проверяем наличие сообщения ?>

        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('success'); // получаем и отображаем сообщение ?>
        </div>
    <?php endif; ?>

<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive" xmlns="http://www.w3.org/1999/html">
        <table class="table table-hover table-striped"
        <thead>
        <tr>
            <th>Фото</th>
            <th>Назва</th>
            <th>Кіль-к</th>
            <th>Ціна</th>
            <th>Сума</th>
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
                <td><a href="/details/<?= $id ?>"><?= $item['name']?></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?></td>
                <td><?= $item['qty'] * $item['price']?></td>
                <td align="right"><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">Всього: </td>
            <td align="right"><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="5">На суму: </td>
            <td align="right"><?= $session['cart.sum'] ?></td>
        </tr>

        </tbody>
        </table>
    </div>
    <hr/>
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($order, 'name') ?>
    <?= $form->field($order, 'email') ?>
    <?= $form->field($order, 'phone') ?>
    <?= $form->field($order, 'address') ?>
    <?= Html::submitButton('Замовити', ['class' => 'btn btn-success']) ?>
    <?php $form = ActiveForm::end() ?>

<?php else: ?>

    <div class="cart-font">Корзина пуста</div>

    <div class="text-center">
    <?= Html::img("@web/images/config/cart.png",
        ['height' => 400]); ?>
    </div>
<?php endif; ?>

</div>








