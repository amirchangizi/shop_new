<?php

use common\modules\customermanagement\CustomermanagementModule ;

return [
    'id' => 'customermanagement',
    'class' => CustomermanagementModule::className(),
    'otherConfig' => [
        'maxAttempts' => 2,
        'enableRegistration'=>true,
        //'layout' => '@app/themes/ace/views/layouts/main',
    ],
    'urlManagerRules' => [
        '/customer' => '/customermanagement/default/index',
        '/customer/index' => '/customermanagement/users/index',
        '/customer/insert' => '/customermanagement/users/create',
        '/customer/edit/<id:\w+>' => '/customermanagement/users/update',
        '/customer/show/<id:\w+>' => '/customermanagement/users/view',
        '/customer/remove/<id:\w+>' => '/customermanagement/users/delete',
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
