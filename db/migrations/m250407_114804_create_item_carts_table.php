<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_carts}}`.
 */
class m250407_114804_create_item_carts_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('cart_items', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer()->notNull(),
            'movie_id' => $this->integer()->notNull(),
            'price' => $this->decimal(10,2)->notNull(),
            'added_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Índices
        $this->createIndex('idx_cart_items_unique', 'cart_items', ['cart_id', 'movie_id'], true);
        $this->createIndex('idx_cart_items_movie', 'cart_items', ['movie_id']);

        // Claves foráneas
        $this->addForeignKey(
            'fk_cart_items_cart',
            'cart_items',
            'cart_id',
            'carts',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_cart_items_movie',
            'cart_items',
            'movie_id',
            'movies',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Configuración de AUTO_INCREMENT
        $this->db->createCommand("ALTER TABLE cart_items AUTO_INCREMENT = 1")->execute();

        // Opcional: establecer el motor InnoDB y el charset
        // $this->db->createCommand("ALTER TABLE cart_items ENGINE = InnoDB")->execute();
        // $this->db->createCommand("ALTER TABLE cart_items DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_general_ci")->execute();
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_cart_items_cart', 'cart_items');
        $this->dropForeignKey('fk_cart_items_movie', 'cart_items');
        $this->dropIndex('idx_cart_items_unique', 'cart_items');
        $this->dropIndex('idx_cart_items_movie', 'cart_items');
        $this->dropTable('cart_items');
    }
}
