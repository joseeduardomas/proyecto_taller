<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Acerca De';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Esta es una página de acerca de. Se puede modificar en el siguiente archivo:
    </p>

    <code><?= __FILE__ ?></code>
</div>
