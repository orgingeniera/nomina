<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario_trabajo".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $created_at
 * @property string $updated_at
 *
 * @property EmpleadoDetalles[] $empleadoDetalles
 * @property HorarioDia[] $horarioDias
 */
class HorarioTrabajo extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario_trabajo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'default', 'value' => null],
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[EmpleadoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleadoDetalles()
    {
        return $this->hasMany(EmpleadoDetalles::class, ['horario_trabajo_id' => 'id']);
    }

    /**
     * Gets query for [[HorarioDias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorarioDias()
    {
        return $this->hasMany(HorarioDia::class, ['horario_trabajo_id' => 'id']);
    }

}
