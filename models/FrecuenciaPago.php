<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "frecuencia_pago".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property EmpleadoDetalles[] $empleadoDetalles
 */
class FrecuenciaPago extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frecuencia_pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
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
        return $this->hasMany(EmpleadoDetalles::class, ['frecuencia_pago_id' => 'id']);
    }

}
