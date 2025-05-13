<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario_dia".
 *
 * @property int $id
 * @property int $horario_trabajo_id
 * @property string $dia_semana
 * @property string $hora_inicio
 * @property string $hora_fin
 *
 * @property HorarioTrabajo $horarioTrabajo
 */
class HorarioDia extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario_dia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horario_trabajo_id', 'dia_semana', 'hora_inicio', 'hora_fin'], 'required'],
            [['horario_trabajo_id'], 'integer'],
            [['hora_inicio', 'hora_fin'], 'safe'],
            [['dia_semana'], 'string', 'max' => 10],
            [['horario_trabajo_id'], 'exist', 'skipOnError' => true, 'targetClass' => HorarioTrabajo::class, 'targetAttribute' => ['horario_trabajo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'horario_trabajo_id' => 'Horario Trabajo ID',
            'dia_semana' => 'Dia Semana',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
        ];
    }

    /**
     * Gets query for [[HorarioTrabajo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorarioTrabajo()
    {
        return $this->hasOne(HorarioTrabajo::class, ['id' => 'horario_trabajo_id']);
    }

}
