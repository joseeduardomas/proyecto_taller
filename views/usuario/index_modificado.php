<?php

use yii\grid\SerialColumn;
use app\models\usuario\Usuario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\usuario\UsuarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa-solid fa-left-long"></i> Vista original', ['usuario/index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('<i class="fa-solid fa-plus"></i> Agregar Usuario', ['usuario/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'gridViewUsuarios',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],
            'id',
            'nombre:ntext',
            'primer_apellido:ntext',
            'segundo_apellido:ntext',
            'username:ntext',
            [
                'attribute' => 'status',
                'format' => 'boolean'
            ],
            //'password:ntext',
            //'auth_key:ntext',
            //'access_token:ntext',
            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Usuario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],*/
            [
                'class'=> ActionColumn::class,
                'template' => '{view} {update} {delete} {reactivar}',
                'headerOptions' => ['style' => 'width: 15%; text-align: center;'],
                'contentOptions' => ['style'=>'vertical-align: middle;', 'class' => 'text-center'],
                'header'=> Yii::t('app', 'Acciones'),
                'buttons' => [
                    'view' => function($url, $model, $key) {
                        return Html::a('<i class="fa-solid fa-eye"></i>', ['usuario/view', 'id' => $model->id],
                            ['class'=>'btn btn-success']
                        );
                    },
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class="fa-solid fa-pen-to-square"></i>', ['usuario/update', 'id' => $model->id],
                            ['class'=>'btn btn-primary']
                        );
                    },
                    'delete' => function($url, $model, $key) {
                        return Html::a('<i class="fa-solid fa-square-minus"></i>', ['usuario/delete', 'id' => $model->id],
                            [
                                'class'=>'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('app', '¿Seguro que deseas desactivar este elemento?'),
                                    'method' => 'post',
                                ],
                            ]
                        );
                    },
                    'reactivar' => function($url, $model, $key) {
                        return Html::a('<i class="fa-solid fa-rotate"></i>', ['usuario/delete', 'id' => $model->id],
                            [
                                'class'=>'btn btn-warning',
                                'data' => [
                                    'confirm' => Yii::t('app', '¿Seguro que deseas activar este elemento?'),
                                    'method' => 'post',
                                ],
                            ]
                        );
                    },
                ],

                'visibleButtons' => [
                    'delete' => function($model, $key, $index) {
                        return $model->isActivo();
                    },
                    'reactivar' => function($model, $key, $index) {
                        return !$model->isActivo();
                    },
                ],
            ],
        ],
    ]); ?>


</div>
