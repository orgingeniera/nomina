<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HorarioDia $model */

$this->title = 'Create Horario Dia';
$this->params['breadcrumbs'][] = ['label' => 'Horario Dias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-dia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
