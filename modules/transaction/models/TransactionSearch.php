<?php

namespace app\modules\transaction\models;
use yii\data\ActiveDataProvider;


/**
 * Transaction search model
 * @property Transaction $username_to
 * @property Transaction $username_from
 */
class TransactionSearch extends Transaction
{
    public $username_to;
    public $username_from;
    public $amount;

    /**
     * @return ActiveDataProvider
     */
    public function search()
    {
        $query = Transaction::find()
            ->where(['username_to' => $this->getNameCurrentUser()])
            ->orWhere(['username_from' => $this->getNameCurrentUser()]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $dataProvider;
    }

    /**
     * @return ActiveDataProvider
     */
    public function searchAll()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Account::find()
        ]);

        //$dataProvider = new ActiveDataProvider([
        //    'query' => $query,
        //]);

        //$this->load($params);

        //if (!$this->validate()) {
        //    return $dataProvider;
        //}

        // grid filtering conditions
        //$query->andFilterWhere([
        //    'username_to' => $this->username_to,
        //    'username_from' => $this->username_from
        //]);

        return $dataProvider;
    }

    /**
     * @return mixed
     */
    public function getNameCurrentUser()
    {
        return \Yii::$app->user->identity->username;
    }

}
