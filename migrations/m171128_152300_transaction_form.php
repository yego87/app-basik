<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m171128_152300_transaction_form
 */
class m171128_152300_transaction_form extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction_form}}', [
            'id' => Schema::TYPE_BIGPK,
            'email_to' => 'varchar(255) NOT NULL',
            'email_from' => 'varchar(255) NOT NULL',
            'amount' => 'int(5) NOT NULL',

        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171128_152300_transaction_form cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171128_152300_transaction_form cannot be reverted.\n";

        return false;
    }
    */
}
