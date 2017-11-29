<?php

namespace app\modules\transaction\controllers;

use app\modules\transaction\models\Account;
use Yii;
use yii\web\Controller;

/**
 * Payment account transaction controller
 */
class AccountController extends Controller
{

    /**
     * List
     * @return string
     */

    public function actionIndex()
    {
        $model = Account::findOne(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) ) {
            return $this->render('index', compact('model'));
        } else {
            return $this->render('index', compact('model'));
        }
    }
}
