<?php

use yii\db\Migration;

class m250513_015022_create_historial_cargo_salario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('{{%historial_cargo_salario}}', [
            'id' => $this->primaryKey(),
            'empleado_id' => $this->integer()->notNull(),
            'cargo_anterior' => $this->string(100)->null(),
            'cargo_nuevo' => $this->string(100)->null(),
            'salario_anterior' => $this->decimal(12, 2)->null(),
            'salario_nuevo' => $this->decimal(12, 2)->null(),
            'fecha_cambio' => $this->date()->notNull(),
            'observaciones' => $this->text()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

      
        $this->addForeignKey(
            'fk-historial_cargo_salario-empleado_id',
            '{{%historial_cargo_salario}}',
            'empleado_id',
            '{{%empleados}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropForeignKey('fk-historial_cargo_salario-empleado_id', '{{%historial_cargo_salario}}');
        $this->dropTable('{{%historial_cargo_salario}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250513_015022_create_historial_cargo_salario cannot be reverted.\n";

        return false;
    }
    */
}
