<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property int $id
 * @property string $nombre_completo
 * @property string $numero_identificacion
 * @property string|null $fecha_nacimiento
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $correo_electronico
 * @property string|null $estado_civil
 * @property string|null $nacionalidad
 * @property string|null $banco
 * @property string|null $tipo_cuenta
 * @property string|null $numero_cuenta
 * @property string $created_at
 * @property string $updated_at
 */
class Empleados extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento', 'direccion', 'telefono', 'correo_electronico', 'estado_civil', 'nacionalidad', 'banco', 'tipo_cuenta', 'numero_cuenta'], 'default', 'value' => null],
            [['nombre_completo', 'numero_identificacion'], 'required'],
            [['fecha_nacimiento', 'created_at', 'updated_at'], 'safe'],
            [['nombre_completo', 'direccion'], 'string', 'max' => 255],
            [['numero_identificacion', 'telefono', 'estado_civil'], 'string', 'max' => 20],
            [['correo_electronico', 'banco'], 'string', 'max' => 100],
            [['nacionalidad', 'tipo_cuenta', 'numero_cuenta'], 'string', 'max' => 50],
            [['numero_identificacion'], 'unique'],
            [['correo_electronico'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_completo' => 'Nombre Completo',
            'numero_identificacion' => 'Numero Identificacion',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'correo_electronico' => 'Correo Electronico',
            'estado_civil' => 'Estado Civil',
            'nacionalidad' => 'Nacionalidad',
            'banco' => 'Banco',
            'tipo_cuenta' => 'Tipo Cuenta',
            'numero_cuenta' => 'Numero Cuenta',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
