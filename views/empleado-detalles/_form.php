<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoContrato;
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

    <?= $form->field($model, 'departamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_contrato_id')->dropDownList(
    ArrayHelper::map(TipoContrato::find()->all(), 'id', 'nombre'),
    ['prompt' => 'Seleccione el tipo de contrato']
) ?>

    <?= $form->field($model, 'salario_base')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frecuencia_pago')->dropDownList([
        'Mensual' => 'Mensual',
        'Quincenal' => 'Quincenal',
        'Catorcenal' => 'Catorcenal',
        'Semanal' => 'Semanal',
        'Diaria' => 'Diaria',
    ], ['prompt' => 'Seleccione una frecuencia de pago']) ?>

    <?= $form->field($model, 'horario_trabajo')->dropDownList([
        'Lunes a viernes, 8:00 AM - 5:00 PM' => 'Lunes a viernes, 8:00 AM - 5:00 PM',
        'Lunes a sábado, 7:00 AM - 3:00 PM' => 'Lunes a sábado, 7:00 AM - 3:00 PM',
        'Turnos rotativos' => 'Turnos rotativos',
        'Nocturno: 10:00 PM - 6:00 AM' => 'Nocturno: 10:00 PM - 6:00 AM',
        'Flexible' => 'Flexible',
    ], ['prompt' => 'Seleccione un horario o escriba uno']) ?>
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
