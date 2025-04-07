<?php

use yii\db\Migration;

class m250407_114246_insert_users_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('users', ['id', 'username', 'password', 'auth_key', 'access_token'], [
            [1, 'David0326', '123456', 'test100key', '100-token'],
            [2, 'Blanky', '123456', 'test101key', '101-token'],
            [3, 'admin', 'admin', 'testadminkey', 'admin-token'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users', ['id' => [1, 2, 3]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250407_114246_insert_users_data cannot be reverted.\n";

        return false;
    }
    */
}
