<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado_detalles".
 *
 * @property int $id
 * @property int $empleado_id
 * @property string $fecha_contratacion
 * @property string $cargo
 * @property float $salario_base
 * @property string|null $eps
 * @property string|null $afp
 * @property string|null $caja_compensacion
 * @property string $created_at
 * @property string $updated_at
 * @property int $tipo_contrato_id
 * @property int $departamento_id
 * @property int $frecuencia_pago_id
 * @property int|null $horario_trabajo_id
 *
 * @property Departamento $departamento
 * @property FrecuenciaPago $frecuenciaPago
 * @property HorarioTrabajo $horarioTrabajo
 * @property TipoContrato $tipoContrato
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
            [['eps', 'afp', 'caja_compensacion', 'horario_trabajo_id'], 'default', 'value' => null],
            [['empleado_id', 'fecha_contratacion', 'cargo', 'salario_base', 'tipo_contrato_id', 'departamento_id', 'frecuencia_pago_id'], 'required'],
            [['empleado_id', 'tipo_contrato_id', 'departamento_id', 'frecuencia_pago_id', 'horario_trabajo_id'], 'integer'],
            [['fecha_contratacion', 'created_at', 'updated_at'], 'safe'],
            [['salario_base'], 'number'],
            [['cargo', 'eps', 'afp', 'caja_compensacion'], 'string', 'max' => 100],
            [['empleado_id'], 'unique'],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::class, 'targetAttribute' => ['departamento_id' => 'id']],
            [['frecuencia_pago_id'], 'exist', 'skipOnError' => true, 'targetClass' => FrecuenciaPago::class, 'targetAttribute' => ['frecuencia_pago_id' => 'id']],
            [['tipo_contrato_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoContrato::class, 'targetAttribute' => ['tipo_contrato_id' => 'id']],
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
            'empleado_id' => 'Empleado ID',
            'fecha_contratacion' => 'Fecha Contratacion',
            'cargo' => 'Cargo',
            'salario_base' => 'Salario Base',
            'eps' => 'Eps',
            'afp' => 'Afp',
            'caja_compensacion' => 'Caja Compensacion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'tipo_contrato_id' => 'Tipo Contrato ID',
            'departamento_id' => 'Departamento ID',
            'frecuencia_pago_id' => 'Frecuencia Pago ID',
            'horario_trabajo_id' => 'Horario Trabajo ID',
        ];
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::class, ['id' => 'departamento_id']);
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
    /**
     * Gets query for [[FrecuenciaPago]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciaPago()
    {
        return $this->hasOne(FrecuenciaPago::class, ['id' => 'frecuencia_pago_id']);
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

    /**
     * Gets query for [[TipoContrato]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoContrato()
    {
        return $this->hasOne(TipoContrato::class, ['id' => 'tipo_contrato_id']);
    }

}
