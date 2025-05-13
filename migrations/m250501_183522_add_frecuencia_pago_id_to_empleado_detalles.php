<?php

use yii\db\Migration;

class m250501_183522_add_frecuencia_pago_id_to_empleado_detalles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         // Agregar columna frecuencia_pago_id a la tabla empleado_detalles
      /*   $this->addColumn('empleado_detalles', 'frecuencia_pago_id', $this->integer()->notNull());

         // Agregar clave foránea para relacionar empleado_detalles con frecuencia_pago
         $this->addForeignKey(
             'fk_empleado_detalles_frecuencia_pago',
             'empleado_detalles',
             'frecuencia_pago_id',
             'frecuencia_pago',
             'id',
             'CASCADE'
         );*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // Eliminar clave foránea y columna
      /* $this->dropForeignKey('fk_empleado_detalles_frecuencia_pago', 'empleado_detalles');
       $this->dropColumn('empleado_detalles', 'frecuencia_pago_id');*/
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250501_183522_add_frecuencia_pago_id_to_empleado_detalles cannot be reverted.\n";

        return false;
    }
    */
}
