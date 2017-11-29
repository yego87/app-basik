<?php

/* @var array $settings */

$settings = parse_ini_file('settings.ini', true);

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$settings['Database']['host']};port={$settings['Database']['port']};dbname={$settings['Database']['dbname']}",
    'username' => $settings['Database']['user'],
    'password' => $settings['Database']['password'],
    'charset' => 'utf8',
    'tablePrefix' => '',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
];