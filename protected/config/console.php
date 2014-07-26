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
        'application.components.*',
        'application.components.ERememberFiltersBehavior',
        'application.extensions.Countries',
    ),
    // application components
    'components'=>array(
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=rpd',
            'emulatePrepare' => true,
            'username' => 'rpd',
            'password' => 'rpd',
            'charset' => 'utf8',
            'tablePrefix' => 'jos_',
        ),
    ),
);