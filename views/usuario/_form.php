<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\usuario\Usuario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'nombre')->textInput() ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'primer_apellido')->textInput() ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'segundo_apellido')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'username')->textInput() ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
    </div>

    <?php // $form->field($model, 'auth_key')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'access_token')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
