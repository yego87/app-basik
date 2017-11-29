<?php

namespace app\modules\transaction\models;

use app\modules\user\models\User;
use yii\db\ActiveRecord;

/**
 * User paymant account
 */
class Account extends ActiveRecord
{

    public $username;

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
            [['username'], 'required'],
            [['balance'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }



    /**
	 * Getter for user name
	 * @return string
	 */
	public function getUsername()
	{
		return $this->user ? $this->user->getUsername() : '';
	}

	/**
	 * Find account by user id
	 * @param int $user_id 
	 * @param bool $forceCreate 
	 * @return static|null
	 */
	public static function findByUser($user_id, $forceCreate = true)
	{
		$model = self::find()->where(['user_id' => $user_id])->one();
		if ($model)
			return $model;

		if (!$forceCreate)
			return null;

		$model = new self([
			'user_id' => $user_id,
			'amount' => 0,
		]);
		$model->save(false);

		return $model;
	}

    /**
     * Add income associated with user and update amount on account
     * @param float $amount
     * @param string $description
     * @param string|null $url
     * @return void
     */
    public function addIncome($amount, $description, $url = null)
    {
        $d = time();
        $transaction = new Transaction([
            'from_id' => $this->user_id,
            'date' => gmdate('Y-m-d H:i:s', $d),
            'year' => gmdate('Y', $d),
            'month' => gmdate('m', $d),
            'income' => $amount,
            'balance' => $this->amount + $amount,
        ]);
        $transaction->save(false);

        $this->updateCounters(['amount' => $amount]);
    }

    /**
     * Add expense associated with user and update amount on account
     * @param float $amount
     * @param string $description
     * @param string|null $url
     * @return void
     */
    public function addTransaction($amount, $description, $url = null)
    {
        $d = time();
        $transaction = new Transaction([
            'user_id' => $this->user_id,
            'date' => gmdate('Y-m-d H:i:s', $d),
            'year' => gmdate('Y', $d),
            'month' => gmdate('m', $d),
            'expense' => $amount,
            'description' => $description,
            'url' => $url,
            'balance' => $this->amount - $amount,
        ]);
        $transaction->save(false);

        $this->updateCounters(['amount' => -$amount]);
    }


}
