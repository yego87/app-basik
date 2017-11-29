<?php

namespace app\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Module;


class BaseModule extends Module
{

	/**
	 * Return module name that uses for translation adding
	 * @return string
	 */
	public static function moduleName()
	{
		throw new InvalidConfigException('The function "moduleName" is not defined in "' . static::className() . '".');
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();

	}

	/**
	 * Current dirname getter
	 * @return string
	 */
	protected static function getDirname()
	{
		$class = new \ReflectionClass(static::className());
		return dirname(dirname($class->getFileName()));
	}
}
