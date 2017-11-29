<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m171129_120815_login_form
 */
class m171129_120815_login_form extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%login_form}}', [
            'id' => Schema::TYPE_BIGPK,
            'username' => 'varchar(255) NOT NULL',
            'balance' => 'integer(10) NOT NULL DEFAULT 7'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171129_120815_login_form cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171129_120815_login_form cannot be reverted.\n";

        return false;
    }
    */
}
