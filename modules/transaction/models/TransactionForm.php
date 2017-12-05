<?php

namespace app\modules\transaction\models;

use app\modules\user\models\User;
use Yii;
use yii\base\Model;

/**
 * TransactionForm is the model behind the transaction form.
 */
class TransactionForm extends Model
{
    public $username_to;
    public $username_from;
    public $amount;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username_to', 'amount'], 'required'],
            [['username_to'], 'validateUsername'],
            [['username_to'], 'string', 'max' => 255],
            [['amount'], 'number', 'min' => 0.01]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username_to' => Yii::t('app', 'Send to username'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }
    /**
     * @inheritdoc
     */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if(is_null(User::findByUsername($this->username_to))){
                User::createUser($this->username_to);
                return true;
            } else {
                return true;
            }
        }

        return false;
    }

    public function validateUsername($attribute, $params)
    {
        if ( $this->username_to === $this->getCurrentUser()->username) {
            $this->addError('username_to', 'You cant send money to you self');
        }
    }

    public function transactionCreate()
    {
        $this->addTransaction();
        $this->addIncome($this->amount, $this->username_to);
        $this->addExpense($this->amount);
    }

    /**
     * Add income associated with user and update balance on account
     * @param number $amount
     * @param $username
     * @return void
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function addIncome($amount, $username)
    {
        $account = Account::findOne([
            'username' => $username,
        ]);

        $account->balance += $amount;

        $account->update(true, ['balance']);
    }

    /**
     * Add expense associated with user and update balance on account
     * @param number $amount
     * @return void
     * @throws \Exception
     * @throws \yii\db\StaleObjectException
     */
    public function addExpense($amount)
    {
        $account = Account::findOne([
            'username' => $this->getCurrentUser()->username,
        ]);

        $account->balance -= $amount;

        $account->update(true, ['balance']);
    }

    /**
     * @return bool
     */
    public function addTransaction()
    {
        $transaction = new Transaction();

        $transaction->username_from = $this->getCurrentUser()->username;
        $transaction->username_to = $this->username_to;
        $transaction->amount = $this->amount;

        return $transaction->save();
    }

    /**
     * @return null|\yii\web\IdentityInterface
     */
    public function getCurrentUser()
    {
        return \Yii::$app->user->identity;
    }
}
