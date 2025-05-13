<?php

use yii\db\Migration;

class m250501_180405_add_fk_empleado_detalles_departamento extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-empleado_detalles-departamento_id',
            '{{%empleado_detalles}}',
            'departamento_id',
            '{{%departamento}}',
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
        $this->dropForeignKey(
            'fk-empleado_detalles-departamento_id',
            '{{%empleado_detalles}}'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250501_180405_add_fk_empleado_detalles_departamento cannot be reverted.\n";

        return false;
    }
    */
}
