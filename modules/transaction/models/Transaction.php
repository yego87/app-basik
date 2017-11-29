<?php

namespace app\modules\transaction\models;

use app\modules\user\models\User;
use Yii;
use yii\db\ActiveRecord;

class Transaction extends ActiveRecord
{
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
            [['email_to', 'email_from'], 'string'],
            [['email_to', 'amount'], 'required'],
            [['email_to', 'email_from'], 'email'],
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
            'email_from' => Yii::t('app', 'From'),
            'email_to' => Yii::t('app', 'To'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }

    public function getBalance($userEmail = null)
    {
        if ($userEmail === null) {
            if (!Yii::$app->user->isGuest) {
                $userEmail = Yii::$app->user->email;
            } else {
                return null;
            }
        }

        return Transaction::find()->where(['email_to' => $userEmail])->sum('amount') - Transaction::find()->where(['email_from' => $userEmail])->sum('amount');
    }
}
