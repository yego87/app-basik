<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m171128_141047_transaction
 */
class m171128_141047_transaction extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction}}', [
            'id' => Schema::TYPE_BIGPK,
            'email_to' => 'varchar(255) NOT NULL',
            'email_from' => 'varchar(255) NOT NULL',
            'amount' => 'int(5) NOT NULL',
            'access_token' => 'varchar(36) DEFAULT NULL',
            'auth_key' => 'varchar(36) DEFAULT NULL',

        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171128_141047_transaction cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171128_141047_transaction cannot be reverted.\n";

        return false;
    }
    */
}
