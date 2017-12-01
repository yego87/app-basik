<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m171129_075750_account
 */
class m171129_075750_account extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%account}}', [
            'id' => Schema::TYPE_BIGPK,
            'username' => 'varchar(255) NOT NULL',
            'balance' => 'decimal(11, 2) NOT NULL',
            'transaction_id' => 'integer(255) NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171129_075750_account cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171129_075750_account cannot be reverted.\n";

        return false;
    }
    */
}
