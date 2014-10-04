<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.models.behaviors.*',
        'application.models.validators.*',
        'application.components.*',
        'application.extensions.Countries',
    ),
    // application components
    'components'=>array(
        'db' => array(
            //'connectionString' => 'mysql:host=localhost;dbname=rpd',
            'connectionString' => 'mysql:host=127.0.0.1;dbname=tracks',
            'emulatePrepare' => true,
            'username' => 'tracks',
            'password' => 'tracks',
            'charset' => 'utf8',
            'tablePrefix' => 'k4ezl_',
        ),
                'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CDbLogRoute',
                    'autoCreateLogTable' => true,
                    'logTableName' => 'k4ezl_yii_logging',
                    'connectionID' => 'db',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);