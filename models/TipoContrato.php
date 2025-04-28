<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_contrato".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property EmpleadoDetalles[] $empleadoDetalles
 */
class TipoContrato extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_contrato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
            [['nombre'], 'unique'],
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
        ];
    }

    /**
     * Gets query for [[EmpleadoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleadoDetalles()
    {
        return $this->hasMany(EmpleadoDetalles::class, ['tipo_contrato_id' => 'id']);
    }

}
