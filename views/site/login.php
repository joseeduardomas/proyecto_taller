<?php

/** @var yii\web\View $this */
/** @var ActiveForm $form */
/** @var app\models\LoginForm $model */

use kartik\form\ActiveForm;
use yii\bootstrap5\Html;

$this->registerCssFile("@web/css/signin.css");
?>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>


<div class="site-login text-center">

    <main class="form-signin">

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'type' => ActiveForm::TYPE_FLOATING,
        ]); ?>

        <img class="mb-4" src="../../web/img/logo.png" alt="" height="57">
        <h1 class="h3 mb-3 fw-normal">Favor de rellenar los campos para ingresar:</h1>

        <div class="form-floating">
            <?= $form->field($model, 'username')
                ->textInput(['autofocus' => true]) ?>
        </div>
        <div class="form-floating">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div>
                <?= Html::submitButton('Login', ['class' => 'w-100 btn btn-lg btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </main>
</div>
