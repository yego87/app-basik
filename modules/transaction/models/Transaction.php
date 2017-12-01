<?php

namespace app\modules\transaction\models;


use Yii;
use yii\db\ActiveRecord;

class Transaction extends ActiveRecord
{

    const TYPE_INCOME = 'Income';
    const TYPE_EXPENSE = 'Expense';

    /**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'keys_transaction';
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username_to', 'username_from'], 'string'],
            //[['type'], 'string'],
            [['amount'], 'number', 'min' => 0.01],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username_to' => Yii::t('app', 'To user'),
            'username_from' => Yii::t('app', 'From user'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }
}
