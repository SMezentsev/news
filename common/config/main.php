<?php
return [
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm' => '@vendor/npm-asset',
  ],

  'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  'components' => [
    'authManager' => [
      'class' => 'yii\rbac\DbManager',
    ],
    'metaTags' => [
      'class' => 'common\components\MetaTags',
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'cdek' => [
      'class' => common\components\CdekApi::class
    ],
    'inflection' => [
      'class' => 'wapmorgan\yii2inflection\Inflection'
    ],
    'cart' => [
      'class' => 'devanych\cart\Cart',
      'storageClass' => 'devanych\cart\storage\SessionStorage',
      'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
      'params' => [
        'key' => 'cart',
        'expire' => 604800,
        'productClass' => 'common\models\Products',
        'productFieldId' => 'id',
        'productFieldPrice' => 'price',
      ],
    ],
    'favorites' => [
      'class' => 'devanych\cart\Cart',
      'storageClass' => 'devanych\cart\storage\SessionStorage',
      'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
      'params' => [
        'key' => 'favorites',
        'expire' => 604800,
        'productClass' => 'common\models\Products',
        'productFieldId' => 'id',
        'productFieldPrice' => 'price',
      ],
    ],
  ],
];
