<?php

use yii\db\Migration;

/**
 * Class m250424_202938_create_empleados_table
 */
class m250424_202938_create_empleados_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%empleados}}', [
            'id' => $this->primaryKey(),
            'nombre_completo' => $this->string()->notNull(),
            'numero_identificacion' => $this->string(20)->unique()->notNull(),
            'fecha_nacimiento' => $this->date(),
            'direccion' => $this->string(),
            'telefono' => $this->string(20),
            'correo_electronico' => $this->string(100)->unique(),
            'estado_civil' => $this->string(20),
            'nacionalidad' => $this->string(50),
            'banco' => $this->string(100),
            'tipo_cuenta' => $this->string(50),
            'numero_cuenta' => $this->string(50),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()')),
            'updated_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()'))->append(' ON UPDATE NOW()'),
        ]);

        // Crea índices (opcional, pero buena práctica)
        $this->createIndex(
            'idx-empleados-numero_identificacion',
            '{{%empleados}}',
            'numero_identificacion'
        );

        $this->createIndex(
            'idx-empleados-nombre_completo',
            '{{%empleados}}',
            'nombre_completo'
        );

        $this->createIndex(
            'idx-empleados-correo_electronico',
            '{{%empleados}}',
            'correo_electronico'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%empleados}}');
    }
}