<?php

use app\models\HorarioDia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HorarioDiaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Horario Dias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-dia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Horario Dia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'horario_trabajo_id',
                'value' => function ($model) {
                    return $model->horarioTrabajo->nombre ?? '(No asignado)';
                },
                'label' => 'Horario de Trabajo',
            ],
            'dia_semana',
            'hora_inicio',
            'hora_fin',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, HorarioDia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
