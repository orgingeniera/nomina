<?php

use yii\db\Migration;

class m250502_182301_update_empleado_detalles_with_horario_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Elimina el campo anterior
    $this->dropColumn('empleado_detalles', 'horario_trabajo');

    // Agrega el nuevo campo de relación
    $this->addColumn('empleado_detalles', 'horario_trabajo_id', $this->integer()->null());

    // Relación con horario_trabajo
    $this->addForeignKey(
        'fk_empleado_detalles_horario',
        'empleado_detalles',
        'horario_trabajo_id',
        'horario_trabajo',
        'id',
        'SET NULL',
        'CASCADE'
    );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250502_182301_update_empleado_detalles_with_horario_id cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250502_182301_update_empleado_detalles_with_horario_id cannot be reverted.\n";

        return false;
    }
    */
}
