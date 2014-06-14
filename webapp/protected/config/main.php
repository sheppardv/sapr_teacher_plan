<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'План роботи викладачів',
//    'language' => 'uk',

    // preloading 'log' component
    'preload' => array('log'),

    'aliases' => array(
        'bootstrap' => 'ext.bootstrap',
    ),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',

        'bootstrap.behaviors.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*'
    ),

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1',
            'ipFilters' => array('127.0.0.1', '10.*.*.*'),
            'generatorPaths' => array('bootstrap.gii'),
        ),

        'admin' => [
            'layoutPath' => 'protected/modules/admin/views/layouts',
        ],

    ),

    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            'allowAutoLogin' => true,
        ),
        'session' => array(
            'autoStart' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'db' => require(dirname(__FILE__) . '/db.php'),

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
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
        'widgetFactory' => array(
            'widgets' => array(
                'CJuiDatePicker' => array(
                    'scriptFile' => 'jquery-ui.min.js',
                    'language' => 'uk',
                    'options' => array(
                        'dateFormat' => 'yy.mm.dd',
                        'showAnim' => 'fold',
                        'fontSize' => '0.85em',
                    ),
                ),
            ),
        ),

        'bootstrap' => array(
            'class' => 'bootstrap.components.BsApi'
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);