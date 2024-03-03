<?php

use yii\web\Request;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$functions = require __DIR__ . '/functions.php';
$baseUrl = str_replace('/web', '', (new Request())->getBaseUrl());
// echo $baseUrl;
// exit;
$config = [
    'id' => 'clinic',
    'timeZone' => 'Asia/Kolkata',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'dashview/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xEMp4UQZM9mip4lOOhndG-6ywtDK6JYl',
            'baseUrl' => $baseUrl,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => '',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
                /*'streamOptions' => [
                    'ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],*/
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'auth' => [
            'class' => 'app\components\Auth',
        ],
        'formatter' => [
            'currencyCode' => '',
        ],
    ],
    'params' => $params,
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = [
    //    'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
    //];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
