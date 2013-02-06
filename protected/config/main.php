<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Video Order',

    'preload' => array('log'),

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