<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m171128_140532_user
 */
class m171128_140532_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_BIGPK,
            'username' => 'varchar(255) NOT NULL',
            'password' => 'varchar(255) NOT NULL',
            //'email' => 'varchar(255) NOT NULL',
            //'access_token' => 'varchar(36) DEFAULT NULL',
            'auth_key' => 'varchar(36) DEFAULT NULL',

        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171128_140532_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171128_140532_user cannot be reverted.\n";

        return false;
    }
    */
}
