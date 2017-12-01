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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->transactionCreate();
            Yii::$app->session->setFlash('success', "Money was successfully send");
            return $this->goHome();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}