<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado_detalles".
 *
 * @property int $id
 * @property int $empleado_id
 * @property string $fecha_contratacion
 * @property string $departamento
 * @property string $cargo
 * @property string $tipo_contrato
 * @property float $salario_base
 * @property string $frecuencia_pago
 * @property string|null $horario_trabajo
 * @property string|null $eps
 * @property string|null $afp
 * @property string|null $caja_compensacion
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Empleados $empleado
 */
class EmpleadoDetalles extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleado_detalles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horario_trabajo', 'eps', 'afp', 'caja_compensacion'], 'default', 'value' => null],
            [['empleado_id', 'fecha_contratacion', 'departamento', 'cargo', 'tipo_contrato', 'salario_base', 'frecuencia_pago'], 'required'],
            [['empleado_id'], 'integer'],
            [['fecha_contratacion', 'created_at', 'updated_at'], 'safe'],
            [['salario_base'], 'number'],
            [['departamento', 'cargo', 'horario_trabajo', 'eps', 'afp', 'caja_compensacion'], 'string', 'max' => 100],
            [['tipo_contrato', 'frecuencia_pago'], 'string', 'max' => 50],
            [['empleado_id'], 'unique'],
            [['empleado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::class, 'targetAttribute' => ['empleado_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empleado_id' => 'Empleado ID',
            'fecha_contratacion' => 'Fecha Contratacion',
            'departamento' => 'Departamento',
            'cargo' => 'Cargo',
            'tipo_contrato' => 'Tipo Contrato',
            'salario_base' => 'Salario Base',
            'frecuencia_pago' => 'Frecuencia Pago',
            'horario_trabajo' => 'Horario Trabajo',
            'eps' => 'Eps',
            'afp' => 'Afp',
            'caja_compensacion' => 'Caja Compensacion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Empleado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleados::class, ['id' => 'empleado_id']);
    }

}
