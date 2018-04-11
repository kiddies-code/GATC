<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
//
//use \yii\web\Request;
//$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
//    'homeUrl' => '/gontoratc',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
//            'baseUrl' => '/gontoratc',
//            'baseUrl' => $baseUrl,

        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

//        'urlManager' => [
//        'enablePrettyUrl' => true,
//        'showScriptName' => false,
//        'rules' => [
//            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//            '<controller:\w+>/<id:\d+>' => '<controller>/view',
//        ],
//                    ],
//       'urlManager' => [
//			'baseUrl' => $baseUrl,
//			'enablePrettyUrl' => true,
//			'showScriptName' => false,
//			'rules' => []
//		],
        
    ],
    'params' => $params,
];
