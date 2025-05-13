<?php

use app\models\Departamento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DepartamentoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Departamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion:ntext',
            [
                'attribute' => 'estado',
                'value' => function ($model) {
                    return $model->estado == 1 ? 'Activo' : 'Inactivo';
                },
                'filter' => [
                    1 => 'Activo',
                    2 => 'Inactivo',
                ], 
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Fecha Creación', // Cambiar el nombre de la columna aquí
                'value' => function ($model) {
                    // Formatear la fecha en formato d-m-Y H:i:s
                    return Yii::$app->formatter->asDatetime($model->created_at, 'php:d-m-Y H:i:s');
                },
            ],
           
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Departamento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
