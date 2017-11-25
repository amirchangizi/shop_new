<?php

use app\modules\modulemanagement\ModulemanagementModule;

return [
    'id' => 'modulemanagement',
    'class' => ModulemanagementModule::className(),
    'otherConfig' => [
        'layout' => '@app/themes/ace/views/layouts/main',
    ],
    'urlManagerRules' => [
        '/module/index' => '/modulemanagement/module/index',
        '/module/edit/module/<id:\w+>' => 'modulemanagement/module/update',
        '/module/config/module/<id:\w+>' => 'modulemanagement/module/config',
        '/module/remove/module/<id:\w+>' => 'modulemanagement/module/delete',
        //'/configs/site-config/index' => '/configuration/site/index',
        //'/users/index' => '/UserManagement/users/index',

    ],

];
