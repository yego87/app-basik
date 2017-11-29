<?php

namespace app\modules\transaction\models;

use app\modules\user\models\User;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class TransactionForm extends ActiveRecord
{
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email_to', 'amount'], 'required'],
            [['amount'], 'number'],
            ['email_from', 'email'],
            ['email_to', 'email'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function transactionCreate()
    {
        //if(\Yii::$app->user->isGuest) {
            $transaction = new TransactionForm();

            $transaction->email_to = $this->email_to;
            $transaction->email_from = \Yii::$app->user->username;
            $transaction->amount = $this->amount;

            $transaction->save();

            $userId = User::findOne(['username' => $this->email_to]);//$this->amount
            $account = Account::find(['user_id' => $userId]);
            $account->balance = $account->balance - $this->amount;

            $account->update(true,['balance' => $account->balance]);
            //return true;
   //     }else return false;
    }

    /**
     * Add income associated with user and update amount on accaunt
     * @param float $amount
     * @param string $description
     * @param string|null $url
     * @return void
     */
    public function addIncome($amount)
    {
        $transaction = new Transaction([
            'user_id' => $this->user_id,
            'balance' => $this->amount + $amount,
        ]);
        $transaction->save(false);
        $this->updateCounters(['amount' => $amount]);
    }
    /**
     * Add expense associated with user and update amount on accaunt
     * @param float $amount
     * @param string $description
     * @param string|null $url
     * @return void
     */
    public function addExpense($amount, $description, $url = null)
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
