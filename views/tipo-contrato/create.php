<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TipoContrato $model */

$this->title = 'Create Tipo Contrato';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-contrato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
