<?php

use yii\db\Migration;

class m250426_042449_add_foreign_key_to_empleado_detalles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Verificar si la columna 'nombre' ya existe en la tabla 'tipo_contrato'
    if (!$this->db->schema->getTableSchema('{{%tipo_contrato}}')->getColumn('nombre')) {
        // Si no existe, agregar la columna
        $this->addColumn('{{%tipo_contrato}}', 'nombre', $this->string(50)->notNull()->unique());
    }
        // Agregar clave foránea
        $this->addForeignKey(
            'fk-empleado_detalles-tipo_contrato_id',  // nombre de la clave foránea
            '{{%empleado_detalles}}',                  // tabla origen
            'tipo_contrato_id',                        // columna en la tabla origen
            '{{%tipo_contrato}}',                      // tabla destino
            'id',                                      // columna en la tabla destino
            'RESTRICT',                                 // acción en caso de eliminar la fila en la tabla destino
            'CASCADE'                                  // acción en caso de eliminar la fila en la tabla origen
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // Eliminar la clave foránea en caso de revertir la migración
       $this->dropForeignKey(
        'fk-empleado_detalles-tipo_contrato_id',  // nombre de la clave foránea
        '{{%empleado_detalles}}'                   // tabla origen
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250426_042449_add_foreign_key_to_empleado_detalles cannot be reverted.\n";

        return false;
    }
    */
}
