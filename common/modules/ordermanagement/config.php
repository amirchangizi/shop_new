<?php

use common\modules\ordermanagement\OrdermanagementModule ;

return [
    'id' => 'ordermanagement',
    'class' => OrdermanagementModule::className(),
    'otherConfig' => [
        'layout' => '@app/themes/ace/views/layouts/main',
    ],
    'urlManagerRules' => [

        '/order/sale'                  => '/ordermanagement/sale' ,
        '/order/sale/index'            => '/ordermanagement/sale/index' ,
        '/order/sale/return'           => '/ordermanagement/returns' ,
        '/order/sale/return/index'     => '/ordermanagement/returns/index' ,
        '/order/sale/return/<id:\w+>'  => '/ordermanagement/returns/view',
        '/order/sale/history'          => '/ordermanagement/sale/history' ,
        '/order/sale/edit/<id:\w+>'    => '/ordermanagement/sale/update',
        '/order/sale/show/<id:\w+>'    => '/ordermanagement/sale/view',
    ],
    'modules' => [

    ],

];
