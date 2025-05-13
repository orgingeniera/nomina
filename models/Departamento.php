<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $estado
 * @property string $created_at
 * @property string $updated_at
 *
 * @property EmpleadoDetalles[] $empleadoDetalles
 */
class Departamento extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'default', 'value' => null],
            [['estado'], 'default', 'value' => 1],
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['estado'], 'integer'],
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
            'estado' => 'Estado',
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
        return $this->hasMany(EmpleadoDetalles::class, ['departamento_id' => 'id']);
    }

}
