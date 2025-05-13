<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HorarioDia $model */

$this->title = 'Update Horario Dia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Horario Dias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horario-dia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
