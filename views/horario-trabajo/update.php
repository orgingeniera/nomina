<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HorarioTrabajo $model */

$this->title = 'Update Horario Trabajo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Horario Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horario-trabajo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
