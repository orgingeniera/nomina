<?php

use yii\db\Migration;

class m250501_184527_drop_frecuencia_pago_id_from_empleado_detalles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('empleado_detalles', 'frecuencia_pago');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('empleado_detalles', 'frecuencia_pago', $this->string()->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250501_184527_drop_frecuencia_pago_id_from_empleado_detalles cannot be reverted.\n";

        return false;
    }
    */
}
