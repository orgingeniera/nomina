<?php

use app\models\EmpleadoDetalles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EmpleadoDetallesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empleado Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-detalles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Empleado Detalles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'empleado_id',
                'label' => 'Empleado',
                'value' => function ($model) {
                    return $model->empleado ? $model->empleado->nombre_completo : 'Sin asignar';
                },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Empleados::find()->all(), 'id', 'nombre_completo'),
            ],
            'fecha_contratacion',
            [
                'attribute' => 'departamento_id',
                'label' => 'Departamento', // Cambiar el nombre de la columna
                'value' => function ($model) {
                    return $model->departamento ? $model->departamento->nombre : 'Sin departamento';
                },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Departamento::find()->all(), 'id', 'nombre'),
            ],
            'cargo',
            //'tipo_contrato',
            //'salario_base',
            //'frecuencia_pago',
            //'horario_trabajo',
            //'eps',
            //'afp',
            //'caja_compensacion',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EmpleadoDetalles $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
