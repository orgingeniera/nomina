<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\empleados $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_completo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_civil')->dropDownList([
    'soltero' => 'Soltero',
    'casado' => 'Casado',
    'union_libre' => 'Unión libre',
    'divorciado' => 'Divorciado',
    'viudo' => 'Viudo',
], ['prompt' => 'Seleccione su estado civil']) ?>

    <?= $form->field($model, 'nacionalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'banco')->dropDownList([
    'bancolombia' => 'Bancolombia',
    'davivienda' => 'Davivienda',
    'bbva' => 'BBVA',
    'banco_de_bogota' => 'Banco de Bogotá',
    'banco_agrario' => 'Banco Agrario',
    'colpatria' => 'Scotiabank Colpatria',
    'banco_av_villas' => 'Banco AV Villas',
    'banco_popular' => 'Banco Popular',
    'itau' => 'Itaú',
    'coomeva' => 'Bancoomeva',
    'pichincha' => 'Banco Pichincha',
], ['prompt' => 'Seleccione un banco']) ?>


    <?= $form->field($model, 'tipo_cuenta')->dropDownList([
    'ahorros' => 'Ahorros',
    'corriente' => 'Corriente',
    'nomina' => 'Nómina',
], ['prompt' => 'Seleccione un tipo de cuenta']) ?>

    <?= $form->field($model, 'numero_cuenta')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
