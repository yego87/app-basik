<?php

namespace app\modules\transaction;

/**
 * payment module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public static function moduleName()
    {
        return 'Transaction';
    }

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\transaction\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
