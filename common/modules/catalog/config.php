<?php

use common\modules\catalog\CatalogModule ;

return [
    'id' => 'catalog',
    'class' => CatalogModule::className(),
    'otherConfig' => [

        //'layout' => '@app/themes/ace/views/layouts/main',
    ],
    'urlManagerRules' => [

        '/catalog/admin/html'                       => '/catalog/admin/html',

        '/catalog/admin/category'                   => '/catalog/admin/category',
        '/catalog/admin/category/index'             => '/catalog/admin/category/index',
        '/catalog/admin/category/insert'            => '/catalog/admin/category/create',
        '/catalog/admin/category/edit/<id:\w+>'     => '/catalog/admin/category/update',
        '/catalog/admin/category/show/<id:\w+>'     => '/catalog/admin/category/view',
        '/catalog/admin/category/remove/<id:\w+>'   => '/catalog/admin/category/delete',

        '/catalog/admin/manufacturers'                   => '/catalog/admin/manufacturers',
        '/catalog/admin/manufacturers/index'             => '/catalog/admin/manufacturers/index',
        '/catalog/admin/manufacturers/insert'            => '/catalog/admin/manufacturers/create',
        '/catalog/admin/manufacturers/edit/<id:\w+>'     => '/catalog/admin/manufacturers/update',
        '/catalog/admin/manufacturers/show/<id:\w+>'     => '/catalog/admin/manufacturers/view',
        '/catalog/admin/manufacturers/remove/<id:\w+>'   => '/catalog/admin/manufacturers/delete',

        '/catalog/admin/product'                   => '/catalog/admin/product',
        '/catalog/admin/product/index'             => '/catalog/admin/product/index',
        '/catalog/admin/product/insert'            => '/catalog/admin/product/create',
        '/catalog/admin/product/edit/<id:\w+>'     => '/catalog/admin/product/update',
        '/catalog/admin/product/show/<id:\w+>'     => '/catalog/admin/product/view',
        '/catalog/admin/product/remove/<id:\w+>'   => '/catalog/admin/product/delete',

        '/catalog/admin/option'                   => '/catalog/admin/option',
        '/catalog/admin/option/index'             => '/catalog/admin/option/index',
        '/catalog/admin/option/insert'            => '/catalog/admin/option/create',
        '/catalog/admin/option/edit/<id:\w+>'     => '/catalog/admin/option/update',
        '/catalog/admin/option/show/<id:\w+>'     => '/catalog/admin/option/view',
        '/catalog/admin/option/remove/<id:\w+>'   => '/catalog/admin/option/delete',

    ],
    'modules' => [
        'admin' => [
            'class' => 'common\modules\catalog\modules\admin\AdminModule',
            'layout' => '@app/themes/ace/views/layouts/main',
        ],
    ],

];
