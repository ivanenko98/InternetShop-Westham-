<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



?>

    <h1>Реєстрація</h1>
    <div class="fieldset">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"login\">{input}</div>\n<div class=\"\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username', ['enableLabel' => false])->textInput(array('placeholder' => 'Ваше ім`я', 'class'=>'')); ?>

        <?= $form->field($model, 'email', ['enableLabel' => false])->textInput(array('placeholder' => 'E-mail', 'class'=>'')); ?>

        <?= $form->field($model, 'password', ['enableLabel' => false])->passwordInput()->textInput(array('placeholder' => 'Пароль', 'class'=>''));?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Зареєструватися', ['class' => 'submit', 'name' => 'login-button']) ?>
            </div>
        </div>


    <?php ActiveForm::end(); ?>

    
	</div>
