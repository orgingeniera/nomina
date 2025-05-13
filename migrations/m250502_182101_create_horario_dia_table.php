<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%horario_dia}}`.
 */
class m250502_182101_create_horario_dia_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%horario_dia}}', [
            'id' => $this->primaryKey(),
            'horario_trabajo_id' => $this->integer()->notNull(),
            'dia_semana' => $this->string(10)->notNull(), // Ej: Lunes, Martes...
            'hora_inicio' => $this->time()->notNull(),
            'hora_fin' => $this->time()->notNull(),
        ]);
        // Clave foránea
        $this->addForeignKey(
            'fk_horario_dia_trabajo',
            'horario_dia',
            'horario_trabajo_id',
            'horario_trabajo',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%horario_dia}}');
    }
}
