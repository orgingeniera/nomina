<?php

use yii\db\Migration;

class m250501_175310_update_empleado_detalles_add_departamento_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = '{{%empleado_detalles}}';

    $columns = $this->db->getTableSchema($table)->columns;

    // Elimina la columna vieja si existe
    if (isset($columns['departamento'])) {
        $this->dropColumn($table, 'departamento');
    }

    // Solo añade la nueva columna si no existe
    if (!isset($columns['departamento_id'])) {
        $this->addColumn($table, 'departamento_id', $this->integer()->notNull());

        $this->addForeignKey(
            'fk-empleado_detalles-departamento_id',
            $table,
            'departamento_id',
            '{{%departamento}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-empleado_detalles-departamento_id', '{{%empleado_detalles}}');
        $this->dropColumn('{{%empleado_detalles}}', 'departamento_id');
        $this->addColumn('{{%empleado_detalles}}', 'departamento', $this->string(100)->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250501_175310_update_empleado_detalles_add_departamento_id cannot be reverted.\n";

        return false;
    }
    */
}
