<?php
$params = array_merge(
  require __DIR__ . '/../../common/config/params.php',
  require __DIR__ . '/../../common/config/params-local.php',
  require __DIR__ . '/params.php',
  require __DIR__ . '/params-local.php'
);

$config = [
  'id' => 'app-frontend',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'modules' => [
    'treemanager' => [
      'class' => '\kartik\tree\Module',
      // other module settings, refer detailed documentation
    ],
    'gridview' => [
      'class' => 'kartik\grid\Module'
    ],
  ],
  'controllerNamespace' => 'frontend\controllers',
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm' => '@vendor/npm-asset',
  ],
//     'i18n' => [
//         'translations' => [
//             '*' => [
//                 'sourceLanguage' => 'ru-RU',
//                 'class' => '\vendor\yiisoft\yii2\i18n\PhpMessageSource',
//                 'basePath' => '@app/messages',
//                 'fileMap' => [
//                     'app' => 'app.php',
//                     'app/error' => 'error.php',
//                 ],
//             ],
//         ],
//     ],
  'language' => 'ru-RU',
  'components' => [
    'Catalog' => [
      'class' => \common\components\Catalog::class,
    ],
    'pages' => [
      'class' => \common\components\Pages::class,
    ],
    'assetManager' => [
      'appendTimestamp' => false,
    ],
    'request' => [
      // 'csrfParam' => '_csrf-frontend',
    ],
    'user' => [
      'identityClass' => 'common\models\User',
      'enableAutoLogin' => true,
      'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
    ],
    'session' => [
      // this is the name of the session cookie used for login on the frontend
      'name' => 'advanced-frontend',
      'savePath' => '../../tmp'
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
    ]

  ],
  'params' => $params,
];

//if (YII_ENV_DEV) {
//  // configuration adjustments for 'dev' environment
//  $config['bootstrap'][] = 'gii';
//  $config['modules']['gii'] = [
//    'class' => 'yii\gii\Module',
//  ];
//  // configuration adjustments for 'dev' environment
//  // requires version `2.1.21` of yii2-debug module
//  $config['bootstrap'][] = 'debug';
//  $config['modules']['debug'] = [
//    'class' => 'yii\debug\Module',
//    // uncomment the following to add your IP if you are not connecting from localhost.
//    //'allowedIPs' => ['127.0.0.1', '::1'],
//  ];
//}

return $config;
