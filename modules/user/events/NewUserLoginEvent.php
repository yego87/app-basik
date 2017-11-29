<?php

namespace app\modules\user\events;

use app\modules\user\models\LoginForm;
use yii\base\Event;

class NewUserLoginEvent extends Event
{
    public $loginForm;

    /**
     * UserLoginEvent constructor.
     * @param LoginForm $form
     */
    public function __construct(LoginForm $form)
    {
        $this->loginForm = $form;
    }
}