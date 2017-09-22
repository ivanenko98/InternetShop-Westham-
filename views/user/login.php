<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



?>
<?php $this->beginBody() ?>

    <div class="fieldset">
        <div class="text-center">
        <div id="login-header">Авторизація</div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"login\">{input}</div>\n<div class=\"\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($login_model, 'email', ['enableLabel' => false])->textInput(array('placeholder' => 'E-mail', 'class'=>'')); ?>

        <?= $form->field($login_model, 'password', ['enableLabel' => false])->passwordInput()->textInput(array('placeholder' => 'Пароль', 'class'=>''));?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Увійти', ['class' => 'submit', 'name' => 'login-button']) ?>
            </div>
        </div>


    <?php ActiveForm::end(); ?>

        </div>
    
</div>
<?php $this->endBody() ?>