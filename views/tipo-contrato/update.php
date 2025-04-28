<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TipoContrato $model */

$this->title = 'Update Tipo Contrato: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-contrato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
