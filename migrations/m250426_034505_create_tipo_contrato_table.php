<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipo_contrato}}`.
 */
class m250426_034505_create_tipo_contrato_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipo_contrato}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(50)->notNull()->unique(),
        ]);
        // Insertar valores iniciales
    $this->batchInsert('{{%tipo_contrato}}', ['nombre'], [
        ['Indefinido'],
        ['Fijo'],
        ['Por obra o labor'],
        ['Aprendizaje'],
        ['Temporal'],
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipo_contrato}}');
    }
}
