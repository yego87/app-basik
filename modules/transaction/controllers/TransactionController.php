<?php

namespace app\modules\transaction\controllers;

use app\modules\transaction\models\TransactionForm;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
/**
 * Payment account transaction controller
 */
class TransactionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'roles' => ['@']],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new TransactionForm();
        if ($model->load(Yii::$app->request->post()) && $model->transactionCreate()) {
            Yii::$app->session->setFlash('Thanks');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}