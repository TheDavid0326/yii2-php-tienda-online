<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carts}}`.
 */
class m250407_114610_create_carts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('carts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => "ENUM('active', 'completed', 'abandoned') DEFAULT 'active'",
        ]);

        // Índices
        $this->createIndex('idx_carts_unique', 'carts', ['user_id', 'status'], true);

        // Clave foránea
        $this->addForeignKey(
            'fk_carts_user',
            'carts',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Configuración de AUTO_INCREMENT
        $this->db->createCommand("ALTER TABLE carts AUTO_INCREMENT = 1")->execute();

        // Opcional: establecer el motor InnoDB y el charset
        // $this->db->createCommand("ALTER TABLE carts ENGINE = InnoDB")->execute();
        // $this->db->createCommand("ALTER TABLE carts DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_general_ci")->execute();
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_carts_user', 'carts');
        $this->dropIndex('idx_carts_unique', 'carts');
        $this->dropTable('carts');
    }
}
