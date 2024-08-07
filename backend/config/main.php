<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
      'treemanager' =>  [
        'class' => '\kartik\tree\Module',
        // other module settings, refer detailed documentation
      ],
      'gridview' => [
        'class' => 'kartik\grid\Module'
      ],
    ],

    'components' => [
//        'InitClass'=>[
//            'class'=>'app\components\InitClass'
//        ],

        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
          'rules'           => require __DIR__ . '/routes.php',

        ],
    ],
    'params' => $params,
];
