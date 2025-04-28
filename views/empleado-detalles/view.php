<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\EmpleadoDetalles $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Empleado Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empleado-detalles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'empleado_id',
            'fecha_contratacion',
            'departamento',
            'cargo',
            'tipo_contrato_id',
            'salario_base',
            'frecuencia_pago',
            'horario_trabajo',
            'eps',
            'afp',
            'caja_compensacion',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
