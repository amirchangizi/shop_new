<?php

use app\modules\usermanagement\UsermanagementModule ;

return [
    'id' => 'usermanagement',
    'class' => UsermanagementModule::className(),
    'otherConfig' => [
        'maxAttempts' => 2,
        'enableRegistration'=>true,
        'layout' => '@app/themes/ace/views/layouts/main',
    ],
    'urlManagerRules' => [
        '/users' => '/usermanagement/users/index',
        '/users/index' => '/usermanagement/users/index',
        '/users/insert' => '/usermanagement/users/create',
        '/users/edit/<id:\w+>' => '/usermanagement/users/update',
        '/users/show/<id:\w+>' => '/usermanagement/users/view',
        '/users/remove/<id:\w+>' => '/usermanagement/users/delete',

        '/users/usergroup' => '/usermanagement/usergroup/index',
        '/users/usergroup/insert' => '/usermanagement/usergroup/create',
        '/users/usergroup/edit/<id:\w+>' => '/usermanagement/usergroup/update',
        '/users/usergroup/remove/<id:\w+>' => '/usermanagement/usergroup/delete',

        '/users/config' => '/usermanagement/config/config',
        '/users/set' => '/usermanagement/config/set',



    ],
    'modules' => [

    ],

];
