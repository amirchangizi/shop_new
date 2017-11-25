<?php

use common\modules\shipping\ShippingModule ;

return [
    'id' => 'shipping',
    'class' => ShippingModule::className(),
    'otherConfig' => [
        'layout' => '@app/themes/ace/views/layouts/main',
    ],
    'urlManagerRules' => [


    ],
    'modules' => [
    ],

];
