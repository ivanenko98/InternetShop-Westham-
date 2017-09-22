<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
?>


<div id="error" >
        <div class="error-font">Сторінку не знайдено. Перевірте правильність посилання!</div>
        <?= Html::img('@web/images/config/404.jpg', ['height' => 400]); ?>
</div>






