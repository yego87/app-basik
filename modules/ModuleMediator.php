<?php

namespace app\modules;

use app\modules\transaction\models\Account;
use app\modules\user\models\LoginForm;
use app\modules\user\models\User;
use yii\base\BaseObject;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\db\ActiveRecord;

class ModuleMediator extends BaseObject implements BootstrapInterface
{
    public function bootstrap($app)
    {
            //Event::on(LoginForm::className(), ActiveRecord::EVENT_BEFORE_VALIDATE, [self::className(), 'onUserLogin']);
    }

    public static function onUserLogin(Event $event)
    {

        $form = $event->sender;
        $form->save();

        $user = new User();
        $user->username = $form->username;
        $user->save();

        $account = new Account();
        $account->username = $form->username;
        $account->user_id = User::findOne(['username' => $account->username]);
        $account->balance = 0;
        $account->save();
    }
}