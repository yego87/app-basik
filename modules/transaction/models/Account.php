<?php

namespace app\modules\transaction\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * User payment account
 * @property $username
 * @property $balance
 */
class Account extends ActiveRecord
{
    const DEFAULT_BALANCE = 0;

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'keys_account';
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'balance'], 'required'],
            [['balance'], 'number'],
            [['username'], 'string', 'max' => 255],
            //[['transaction_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' =>'Name',
            'balance' => 'Balance',
            'usernameFrom' => 'From user',
            'usernameTo' => 'To user',
        ];
    }

    /**
     * @param $username
     */
    public function createAccountWhenNewUserCreate($username)
    {
        $account = new self([
            'username' => $username,
            'balance' => self::DEFAULT_BALANCE
        ]);

        $account->save(true);
    }

    /**
     * @return null|static
     */
    public function getAccount()
    {
        return $model = Account::findOne(['username' => Yii::$app->user->identity->username]);
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->getAccount()->balance;
    }
}
