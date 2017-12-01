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
            'username_to' => 'varchar(255) NOT NULL',
            'username_from' => 'varchar(255) NOT NULL',
            'amount' => 'decimal(11, 2) NOT NULL',
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
