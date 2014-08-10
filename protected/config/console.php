<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.models.behaviours.*',
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
            'tablePrefix' => 'dpbfw_',
        ),
    ),
);