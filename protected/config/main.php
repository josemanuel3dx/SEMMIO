<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SEMMIO',
	'language'=>'es',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		  'application.extensions.poll.models.*',
          'application.extensions.poll.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'18837119',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
			
	),

	// application components
	'components'=>array(
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mmio',
			'emulatePrepare' => true,
			'username' => 'tesis_mmio',
			'password' => '15Tesis20Mmio',
			'charset' => 'utf8',
		),
		
		'authManager'=>array(
        'class'=>'CDbAuthManager', // ...almacenados en BD (CDbAuthManager)
        'connectionID'=>'db',
        ),
		
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'salas.brayan@gmail.com',
	),
);
