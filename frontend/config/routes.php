<?php

use yii\rest\UrlRule as RestUrlRule;
use yii\web\UrlRule;

return [
    '' => 'site/index',
    'sitemap.xml' => 'site/sitemap',
    '<action:(terms|faqs|contacts|about|list|delivery)>' => 'site/<action>',
    '<action:(details|remember|addresses|dashboard|history|profile|password)>' => 'account/<action>',
    '<action:(login|register|logout|restore|verify-email)>' => 'auth/<action>',
    '<action:(detail|compare)>' => 'products/<action>',
    '<action:(index|post|view)>' => 'news/<action>',
    'news' => 'news',
    'news/<category_id:\d+>' => 'news',
    'news/<category_id:\d+>/<id:\d+>' => 'news/view',
    'verify-email/<token:\d+>' => 'auth/verify-email',

    'register' => 'auth/register',
    'trackOrder' => 'account/track-order',
    'productsWide' => 'products/wide',
    'POST register' => 'auth/register',
    'wishList' => 'products/wish-list',
    'catalog/favorites' => 'catalog/favorites',
    'favorites' => 'favorites',

    'order/delivery-tariffs' => 'order/delivery-tariffs',

    'product' => 'products/index',
    'search' => 'search/index',
    'GET catalog/<category_id:\d+>' => 'catalog',
    'GET catalog/<category_id:\d+>/<id:\d+>' => 'catalog/view',
    'POST catalog/<category_id:\d+>/<id:\d+>' => 'catalog/view',
    'GET products/<id:\d+>' => 'products/index',

    'GET news/tags/<tag_id:\d+>' => 'news/index',

    'GET account/orders/<id:\d+>' => 'account/orders-detail',
    'GET products/<id:\d+>/detail' => 'products/detail',

    'GET favorites/<id:\d+>/delete' => 'favorites/delete',
    'POST cart/<id:\d+>' => 'cart/add',
    'DELETE cart/<product_id:\d+>' => 'cart/delete',
    'PUT cart/<product_id:\d+>' => 'cart/update',
    'PUT cart/<product_id:\d+>/add-quantity' => 'cart/add-quantity',
    'PUT cart/<product_id:\d+>/sub-quantity' => 'cart/sub-quantity',
    'GET reset-password/<token>' => 'auth/reset-password',
    'POST reset-password/<token>' => 'auth/reset-password',
    'POST favorites/<product_id:\d+>' => 'favorites/add',
    'POST contacts' => 'site/contacts',
    'GET contacts' => 'site/contacts',
    'GET favorites/<product_id:\d+>/delete' => 'favorites/delete',
];
