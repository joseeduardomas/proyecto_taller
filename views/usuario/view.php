<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\usuario\Usuario $model */

//$this->title = $model->id;
$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuario-view">

    <h1 class="text-center"><?= Html::encode($model->nombre) ?></h1>

    <p class="text-center">
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de querer eliminar el siguiente elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <hr>
    <div class="row">
        <div class="col">
            <h3 class="font-weight-bold">Datos del usuario</h3>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'nombre:ntext',
                    'primer_apellido:ntext',
                    'segundo_apellido:ntext',
                ],
            ]) ?>
        </div>

        <div class="col">
            <h3 class="font-weight-bold">Credenciales</h3>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username:ntext',
                    'password:ntext',
                    'auth_key:ntext',
                    'access_token:ntext',
                ],
            ]) ?>
        </div>
    </div>


</div>
