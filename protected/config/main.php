<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('stories', 'd:\work\xampp\images\stories');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'RacingPedia / yTracks',
    'theme' => 'bootstrap',
    //'timeZone' => 'Europe/Amsterdam', 
    //'theme' => 'jwcleanpro',
    //'theme'=>'cars',
    // preloading 'log' component
    'preload' => array('log', 'booster'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.models.behaviors.*',
        'application.models.validators.*',
        'application.components.*',
        'application.components.helpers.*',
        'application.extensions.*',
        'application.extensions.GalleryManager.*',
        'application.extensions.GalleryManager.models.*',
        'application.extensions.alphaPager.*',
    ),
    // application modules
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'innervate',
            'generatorPaths' => array(
                'bootstrap.gii'),
        ),
    ),
    // application components
    'components' => array(
        'booster' => array('class' => 'ext.yiibooster.components.Booster'), // assuming you extracted bootstrap under extensions
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        /* 'image' => array(
          'class' => 'application.extensions.Image.CImageComponent',
          // GD or ImageMagick
          'driver' => 'GD',
          // ImageMagick setup path
          'params' => array('directory' => 'C:/Program Files/ImageMagick-6.8.8-Q16'),
          ), */
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         */
        // uncomment the following to use a MySQL database
        'db' => array(
            //'connectionString' => 'mysql:host=localhost;dbname=rpd',
            'connectionString' => 'mysql:host=127.0.0.1;dbname=tracks',
            'emulatePrepare' => true,
            'username' => 'tracks',
            'password' => 'tracks',
            'charset' => 'utf8',
            'tablePrefix' => 'k4ezl_',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
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
            // uncomment the following to show log messages on web pages
            /* array(
              'class' => 'CWebLogRoute',
              'enabled' => YII_DEBUG
              ), */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'maubert@planet.nl',
    ),
);
