<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%frecuencia_pago}}`.
 */
class m250501_183428_create_frecuencia_pago_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%frecuencia_pago}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%frecuencia_pago}}');
    }
}
