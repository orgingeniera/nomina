<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HorarioTrabajo $model */

$this->title = 'Create Horario Trabajo';
$this->params['breadcrumbs'][] = ['label' => 'Horario Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-trabajo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
