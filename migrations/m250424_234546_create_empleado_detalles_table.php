<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%empleado_detalles}}`.
 */
class m250424_234546_create_empleado_detalles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%empleado_detalles}}', [
            'id' => $this->primaryKey(),
            'empleado_id' => $this->integer()->notNull()->unique(), // relación 1 a 1
            'fecha_contratacion' => $this->date()->notNull(),
            'departamento' => $this->string(100)->notNull(),
            'cargo' => $this->string(100)->notNull(),
            'tipo_contrato_id' => $this->integer()->notNull(),
            'salario_base' => $this->decimal(10, 2)->notNull(),
            'frecuencia_pago' => $this->string(50)->notNull(),
            'horario_trabajo' => $this->string(100),
            'eps' => $this->string(100),
            'afp' => $this->string(100),
            'caja_compensacion' => $this->string(100),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('NOW()')->append(' ON UPDATE NOW()'),
        ]);
 
    $this->addForeignKey(
        'fk-empleado_detalles-empleado_id',
        '{{%empleado_detalles}}',
        'empleado_id',
        '{{%empleados}}',
        'id',
        'CASCADE'
    );
    $this->addForeignKey(
        'fk-empleado_detalles-tipo_contrato_id',
        '{{%empleado_detalles}}',
        'tipo_contrato_id',
        '{{%tipo_contrato}}',
        'id',
        'RESTRICT',
        'CASCADE'
    );
}
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-empleado_detalles-empleado_id', '{{%empleado_detalles}}');
        $this->dropForeignKey('fk-empleado_detalles-tipo_contrato_id', '{{%empleado_detalles}}');
        $this->dropTable('{{%empleado_detalles}}');
    }
}
