<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Video Order',

    'preload' => array('log'),
    'language' => 'ru',

    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.extensions.*',
        'application.extensions.yii-mail.*',
    ),

    'modules' => array(

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),

        'admin'

    ),

    'components' => array(

        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'load' => 'site/load',
                'upload' => 'site/upload',
                'upload_mp3' => 'site/upload_mp3',
                'save' => 'site/save',
                'order/<hash:\w+>' => 'site/order/hash/<hash>',


                'reelconfig/designs/delete/<id:\d+>' => 'admin/designs/delete/id/<id>',
                'reelconfig/designs/<id:\d+>' => 'admin/designs/item/item_id/<id>',
                'reelconfig/designs/add' => 'admin/designs/item',

                'reelconfig/voices/delete/<id:\d+>' => 'admin/voices/delete/id/<id>',
                'reelconfig/voices/<id:\d+>' => 'admin/voices/item/item_id/<id>',
                'reelconfig/voices/add' => 'admin/voices/item',

                'reelconfig/music/delete/<id:\d+>' => 'admin/music/delete/id/<id>',
                'reelconfig/music/<id:\d+>' => 'admin/music/item/item_id/<id>',
                'reelconfig/music/add' => 'admin/music/item',

                'reelconfig/orders/delete/<id:\d+>' => 'admin/orders/delete/id/<id>',
                'reelconfig/orders/<id:\d+>' => 'admin/orders/item/item_id/<id>',

                'reelconfig' => 'admin',
                'reelconfig/<controller:\w+>' => 'admin/<controller>/index',
                'reelconfig/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',


                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            'transportType' => 'php',
            'viewPath' => 'application.views.email',
            'logging' => true,
            'dryRun' => false
        ),

        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            'driver' => 'GD',
        ),

        'db' => require(dirname(__FILE__) . '/db.php'),

        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),

    'params' => array(
        'directory_designs' => '/uploads/designs',
        'directory_tmp' => '/uploads/tmp',
        'directory_voices' => '/uploads/mp3',
        'directory_music' => '/uploads/mp3',
        'directory_user_uploads' => '/uploads/user',
        'admin_password' => '12345',
		'notification_emails' => array('mail@bannerstudio.ru', 'ozicoder@gmail.com'),
		'site_email' => 'mail@bannerstudio.ru',
		
    ),
);