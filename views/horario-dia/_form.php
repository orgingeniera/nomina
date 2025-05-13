<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\HorarioTrabajo;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\HorarioDia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="horario-dia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'horario_trabajo_id')->dropDownList(
        ArrayHelper::map(HorarioTrabajo::find()->all(), 'id', 'nombre'),
        ['prompt' => 'Seleccione un horario de trabajo']
    ) ?>


    <?= $form->field($model, 'dia_semana')->dropDownList([
        'Lunes' => 'Lunes',
        'Martes' => 'Martes',
        'Miércoles' => 'Miércoles',
        'Jueves' => 'Jueves',
        'Viernes' => 'Viernes',
        'Sábado' => 'Sábado',
        'Domingo' => 'Domingo',
    ], ['prompt' => 'Seleccione un día']) ?>

   <?= $form->field($model, 'hora_inicio')->input('time') ?>
    <?= $form->field($model, 'hora_fin')->input('time') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
