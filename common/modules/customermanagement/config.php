<?php

use common\modules\customermanagement\CustomermanagementModule ;

return [
    'id' => 'customermanagement',
    'class' => CustomermanagementModule::className(),
    'otherConfig' => [
        'maxAttempts' => 2,
        'enableRegistration'=>true,
        'layout' => '@app/themes/masa/views/layouts/main',
    ],
    'urlManagerRules' => [
        '/customer' => '/customermanagement/default/index',
        '/customer/login' => '/customermanagement/customers/index',
        '/customer/signup' => '/customermanagement/customers/create',
        '/customer/reset/<id:\w+>' => '/customermanagement/customers/reset',
        '/customer/resetbytoken/<id:\w+>' => '/customermanagement/customers/resetbytoken',
        '/customer/profile/<id:\w+>' => '/customermanagement/customers/view',

        '/customer/usergroup' => '/customermanagement/usergroup/index',
        '/customer/usergroup/insert' => '/customermanagement/usergroup/create',
        '/customer/usergroup/edit/<id:\w+>' => '/customermanagement/usergroup/update',
        '/customer/usergroup/remove/<id:\w+>' => '/customermanagement/usergroup/delete',

        '/customer/admin'=>'/customermanagement/admin/customers' ,
        '/customer/admin/index'=>'/customermanagement/admin/customers' ,
        '/customer/admin/insert' => '/customermanagement/admin/customers/create',
        '/customer/admin/edit/<id:\w+>' => '/customermanagement/admin/customers/update',
        '/customer/admin/show/<id:\w+>' => '/customermanagement/admin/customers/view',
        '/customer/admin/remove/<id:\w+>' => '/customermanagement/admin/customers/delete',

        '/customer/admin/group'=>'/customermanagement/admin/customergroup' ,
        '/customer/admin/group/index'=>'/customermanagement/admin/customergroup' ,
        '/customer/admin/group/insert' => '/customermanagement/admin/customergroup/create',
        '/customer/admin/group/edit/<id:\w+>' => '/customermanagement/admin/customergroup/update',
        '/customer/admin/group/show/<id:\w+>' => '/customermanagement/admin/customergroup/view',
        '/customer/admin/group/remove/<id:\w+>' => '/customermanagement/admin/customergroup/delete',


    ],
    'modules' => [
        'admin' => [
            'class' => 'common\modules\customermanagement\modules\admin\AdminModule',
            'layout' => '@app/themes/ace/views/layouts/main',
        ],
    ],

];
