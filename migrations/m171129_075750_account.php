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
            'user_id' => 'varchar(255) NOT NULL',
            'balance' => 'varchar(255) NOT NULL',
            'transaction_id' => 'int(255) ',
            'amount' => 'int(5) NOT NULL',

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
