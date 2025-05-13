<?php

use yii\db\Migration;

class m250501_185326_add_fk_frecuencia_pago_to_empleado_detalles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Agregar la clave foránea
        $this->addForeignKey(
            'fk-empleado_detalles-frecuencia_pago_id', // Nombre de la clave foránea
            'empleado_detalles', // Tabla que contiene la columna
            'frecuencia_pago_id', // Columna en la tabla empleado_detalles
            'frecuencia_pago', // Tabla a la que se refiere
            'id', // Columna en la tabla frecuencia_pago
            'CASCADE' // Acción al eliminar: si se elimina una fila en frecuencia_pago, se eliminarán las filas relacionadas
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // Eliminar la clave foránea si se revierte la migración
       $this->dropForeignKey('fk-empleado_detalles-frecuencia_pago_id', 'empleado_detalles');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250501_185326_add_fk_frecuencia_pago_to_empleado_detalles cannot be reverted.\n";

        return false;
    }
    */
}
