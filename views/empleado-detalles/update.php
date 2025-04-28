<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EmpleadoDetalles $model */

$this->title = 'Update Empleado Detalles: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Empleado Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empleado-detalles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
