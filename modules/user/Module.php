<?php

namespace app\modules\user;


/**
 * User module definition class
 */
class Module extends \yii\base\Module
{

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
