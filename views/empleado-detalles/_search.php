<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EmpleadoDetallesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empleado-detalles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empleado_id') ?>

    <?= $form->field($model, 'fecha_contratacion') ?>

    <?= $form->field($model, 'departamento') ?>

    <?= $form->field($model, 'cargo') ?>

    <?php // echo $form->field($model, 'tipo_contrato') ?>

    <?php // echo $form->field($model, 'salario_base') ?>

    <?php // echo $form->field($model, 'frecuencia_pago') ?>

    <?php // echo $form->field($model, 'horario_trabajo') ?>

    <?php // echo $form->field($model, 'eps') ?>

    <?php // echo $form->field($model, 'afp') ?>

    <?php // echo $form->field($model, 'caja_compensacion') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
