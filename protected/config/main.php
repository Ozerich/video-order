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


                'admin/designs/delete/<id:\d+>' => 'admin/designs/delete/id/<id>',
                'admin/designs/<id:\d+>' => 'admin/designs/item/item_id/<id>',
                'admin/designs/add' => 'admin/designs/item',

                'admin/voices/delete/<id:\d+>' => 'admin/voices/delete/id/<id>',
                'admin/voices/<id:\d+>' => 'admin/voices/item/item_id/<id>',
                'admin/voices/add' => 'admin/voices/item',

                'admin/music/delete/<id:\d+>' => 'admin/music/delete/id/<id>',
                'admin/music/<id:\d+>' => 'admin/music/item/item_id/<id>',
                'admin/music/add' => 'admin/music/item',

                'admin/orders/delete/<id:\d+>' => 'admin/orders/delete/id/<id>',
                'admin/orders/<id:\d+>' => 'admin/orders/item/item_id/<id>',



                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            'transportType' => 'php',
            'viewPath' => 'application.views.mail',
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
        'admin_password' => '12345'
    ),
);