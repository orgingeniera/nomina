<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FrecuenciaPago $model */

$this->title = 'Update Frecuencia Pago: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frecuencia Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frecuencia-pago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
