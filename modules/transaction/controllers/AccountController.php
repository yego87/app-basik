<?php

namespace app\modules\transaction\controllers;

use app\modules\transaction\models\TransactionSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Payment account transaction controller
 */
class AccountController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    ['allow' => true, 'roles' => ['@']],
                ],
            ],
        ];
    }
    /**
     * List
     * @return string
     */

    public function actionIndex()
    {
        $model = new TransactionSearch();

        $dataProvider = $model->search();

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * List
     * @return string
     */

    public function actionList()
    {
        $model = new TransactionSearch();

        $dataProvider = $model->searchAll();

        return $this->render('list',['dataProvider' => $dataProvider]);
    }
}
