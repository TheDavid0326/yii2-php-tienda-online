<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m250407_114204_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255)->null(),
            'access_token' => $this->string(255)->null(),
        ]);

        $this->batchInsert('users', ['id', 'username', 'password', 'auth_key', 'access_token'], [
            [1, 'David0326', '123456', 'test100key', '100-token'],
            [2, 'Blanky', '123456', 'test101key', '101-token'],
            [3, 'admin', 'admin', 'testadminkey', 'admin-token'],
            [4, 'user', 'user', 'test102key', '102-token'],
        ]);

        // Índice único para usernames
        $this->createIndex('idx_users_username_unique', 'users', 'username', true);

        // Configuración de AUTO_INCREMENT
        $this->db->createCommand("ALTER TABLE users AUTO_INCREMENT = 5")->execute();

        // Opcional: establecer el motor InnoDB y el charset
        $this->db->createCommand("ALTER TABLE users ENGINE = InnoDB")->execute();
        $this->db->createCommand("ALTER TABLE users DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_general_ci")->execute();

    }

    public function safeDown()
    {
        $this->delete('users', ['id' => [1, 2, 3]]);
        $this->dropIndex('idx_users_username_unique', 'users');
        $this->dropTable('users');
    }
}
