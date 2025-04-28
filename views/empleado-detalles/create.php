<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EmpleadoDetalles $model */

$this->title = 'Create Empleado Detalles';
$this->params['breadcrumbs'][] = ['label' => 'Empleado Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-detalles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
