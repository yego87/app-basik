<?php

namespace app\modules\user;

use app\modules\user\events\NewUserLoginEvent;


/**
 * user module definition class
 */
class Module extends \yii\base\Module
{
    const EVENT_USER_LOGIN_UP = 'userLogin';

    public function notifyThatNewUserLogin($form) {
        $this->trigger(Module::EVENT_USER_LOGIN_UP, new NewUserLoginEvent($form));
    }

    /**
     * @inheritdoc
     */
    public static function moduleName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\user\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
