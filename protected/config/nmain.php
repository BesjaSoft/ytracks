<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'yTracks',
	'defaultController' => 'containers/display/section_id/4',
    'theme' => 'ovencms',
	'language' => 'en',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.helpers.*',
		'application.helpers.*',
		'application.components.behaviors.*',
		'application.components.widgets.*',
		'application.extensions.*',
		'application.extensions.nestedset.*',
		'application.modules.gallery.models.*',
		'application.modules.srbac.controllers.SBaseController',
	),
	'preload'=>array('log','ELangHandler'),
	'modules'=>array(
		'gallery' => array(
			"blocks" => array(
				"BlockImages" => "Images (No gallery list)",
				//"BlockTop" => "ImagTop 10",
				"BlockGalleryList" => "Gallery list")),
		'news' => array(
			"blocks" => array(
				"RecentNews" => "Viimased uudised")),
		'srbac'=> array(
			'userclass'=>'User', //optional defaults to User
            'userid'=>'id', //optional defaults to userid
            'username'=>'username', //optional defaults to username
            'debug'=>true, //optional defaults to false
            'pageSize'=>10, //optional defaults to 15
            'superUser' => 'Authority', //optional defaults to Authorizer
            'css'=>'srbac.css', //optional defaults to srbac.css
            'layout'=> 'webroot.themes.ovencms.views.layouts.admin', //'application.views.layouts.main', //optional defaults to empty string
            // must be an existing alias
            'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // optional defaults to
            //srbac.views.authitem.unauthorized, must be an existing alias
            'alwaysAllowed'=> //'gui', //optional defaults to gui
                array(
                    'UserLogin',
                    'UserLogout',
                    'SiteError',
                    'SiteContact',
                    'ArticlesIndex',
                    'news_DefaultRss',
                    'news_DefaultIndex'
                ),
            'userActions'=>array(//optional defaults to empty array
                'Show',
                'View',
                'List'
            ),
            'listBoxNumberOfLines' => 15, //optional defaults to 10 'imagesPath' => 'srbac.images', //optional defaults to srbac.images 'imagesPack'=>'noia', //optional defaults to noia 'iconText'=>true, //optional defaults to false 'header'=>'srbac.views.authitem.header', //optional defaults to
            // srbac.views.authitem.header, must be an existing alias 'footer'=>'srbac.views.authItem.footer', //optional defaults to
            // srbac.views.authitem.footer, must be an existing alias 'showHeader'=>true, //optional defaults to false 'showFooter'=>true, //optional defaults to false
            'alwaysAllowedPath'=>'srbac.components', //optional defaults to srbac.components
            // must be an existing alias
		)
	),
	//'params'=>require(dirname(__FILE__).'/params.php'),

	// application components
	'components'=>array(
//		'session' => array(
//			'class' => 'system.web.CDbHttpSession',
//			'connectionID' => 'db',
//		),
		'widgetFactory'=>array(
            'class'=>'CWidgetFactory',
        ),

		'ELangHandler' => array (
            'class' => 'application.extensions.langhandler.ELangHandler',
            //'languages' => array('ru', 'en', 'et'),
        ),
		'image'=>array(
          'class'=>'application.extensions.ximage.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'C:\serverPHP52\htdocs\yii\ovencms\uploads\gallery'),
        ),
		'db'=>array(
			'class'=>'CDbConnection',
			'connectionString'=>'mysql:host=localhost;dbname=ytracks',
			'username'=>'ytracks',
			'password'=>'ytracks',
		),
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
           	'itemTable' => 'authitem',
            'itemChildTable' => 'authitemchild',
            'assignmentTable' => 'authassignment',
        ),
		'email'=>array(
			'class'=>'application.extensions.email.Email',
			'delivery'=>'mail',
		),
		'user'=>array(
			'class'=>'application.components.WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('user/login'),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace, info, error, warning',
					'categories'=>'system.db.*',
				),
                array(
					'class'=>'CProfileLogRoute',
					'levels'=>'trace, info, error, warning',
					'report' => 'summary',
				),
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, watch',
					'categories'=>'system.*',
                    'filter'=>'CLogFilter'
				),
			),
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			//'caseSensitive'=>false,
			//'class'=>'application.extensions.langhandler.ELangCUrlManager',
			'rules'=>array(
				//'user/register/*'=>'user/create',
				//'user/settings/*'=>'user/update',
				//'<lang:(ru|en|et)>/<_c>/<_a>/' => '<_c>/<_a>',
				'admin' => 'user/login',
                'upload' => 'gallery/default/uploadbigfile'

			),
		),
		'CLinkPager' => array(
			'class'=>'CLinkPager',
			'cssFile'=>false,
		),
        'coreMessages'=>array(
            'basePath'=>'protected/messages',
        ),

	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
        'languages' => array("et" => "Eesti", "en" => "English"),
		'admin_id' => 1,
        'project' => "(www.iluteeninduskool.ee)",
		// this is used in contact page
		'adminEmail'=>'info@tarkvaratehas.ee',
		'imagefolder'=>'./uploads/gallery',
		'logosFolder' => './uploads/logos',
		'eshopfolder' => './uploads/eshop',
        'eshopmanufacturers' => './uploads/eshop/manufacturers',
		'carsfolder' => './uploads/cars',
        'categories' => './uploads/categories',
        'bannersfolder' => './uploads/banners',
        'auctionsfolder' => './uploads/auctions',
		'imageimportfoler' => "C:\\serverPHP52\\xampp\\htdocs\\yii\\ovencms\\uploads\\tmp_gallery", //./uploads/tmp_gallery/", // last is slash
		'conferencefolder' => './uploads/conferences',
		'companyviews' => './uploads/companyviews',
        'classifieds' => './uploads/classifieds',
        'classifieds_files' => './uploads/classifieds/files',
        'creditsfolder' => './uploads/credits/userfiles',

	),
);
