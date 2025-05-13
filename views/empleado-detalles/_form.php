<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoContrato;
use app\models\FrecuenciaPago;
use app\models\HorarioTrabajo;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var app\models\EmpleadoDetalles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empleado-detalles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empleado_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\Empleados::find()->all(), 'id', function($empleado) {
        return $empleado->numero_identificacion . ' ' . $empleado->nombre_completo; // cambia según tus columnas
    }),
    ['prompt' => 'Seleccione un empleado']
) ?>

    <?= $form->field($model, 'fecha_contratacion')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'departamento_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\Departamento::find()->all(), 'id', 'nombre'),
    ['prompt' => 'Selecciona un departamento']
    ) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_contrato_id')->dropDownList(
    ArrayHelper::map(TipoContrato::find()->all(), 'id', 'nombre'),
    ['prompt' => 'Seleccione el tipo de contrato']
) ?>

    <?= $form->field($model, 'salario_base')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frecuencia_pago_id')->dropDownList(
        ArrayHelper::map(FrecuenciaPago::find()->all(), 'id', 'nombre'),
        ['prompt' => 'Seleccione una frecuencia de pago']
    ) ?>

    <?= $form->field($model, 'horario_trabajo_id')->dropDownList(
        ArrayHelper::map(HorarioTrabajo::find()->all(), 'id', 'nombre'),
        ['prompt' => 'Seleccione un horario']
    ) ?>

    <?= $form->field($model, 'eps')->dropDownList([
        'Nueva EPS',
        'Sura',
        'Sanitas',
    ], ['prompt' => 'Seleccione EPS', 'id' => 'eps-select']) ?>

    <?= $form->field($model, 'afp')->dropDownList([
        'Porvenir' => 'Porvenir',
        'Protección' => 'Protección',
        'Colfondos' => 'Colfondos',
        'Old Mutual' => 'Old Mutual',
    ], ['prompt' => 'Seleccione AFP']) ?>

    <?= $form->field($model, 'caja_compensacion')->dropDownList([
        'Comfama' => 'Comfama',
        'Compensar' => 'Compensar',
        'Cafam' => 'Cafam',
        'Colsubsidio' => 'Colsubsidio',
        'Coomfenalco' => 'Coomfenalco',
        'Comfenalco' => 'Comfenalco',
        'ComfaTolima' => 'ComfaTolima',

    ], ['prompt' => 'Seleccione la caja de compensación']) ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
