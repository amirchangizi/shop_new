<?php

namespace common\modules\shopconfig ;

return [
    'id' => 'shopconfig',
    'class' => ShopconfigModule::className(),
    'otherConfig' => [

    ],
    'urlManagerRules' => [

        '/config/language'                  => '/shopconfig/admin/language' ,
        '/config/language/index'            => '/shopconfig/admin/language/index' ,
        '/config/language/insert'           => '/shopconfig/admin/language/create',
        '/config/language/edit/<id:\w+>'    => '/shopconfig/admin/language/update',
        '/config/language/show/<id:\w+>'    => '/shopconfig/admin/language/view',
        '/config/language/remove/<id:\w+>'  => '/shopconfig/admin/language/delete',

        '/config/length'                  => '/shopconfig/admin/length' ,
        '/config/length/index'            => '/shopconfig/admin/length/index' ,
        '/config/length/insert'           => '/shopconfig/admin/length/create',
        '/config/length/edit/<id:\w+>'    => '/shopconfig/admin/length/update',
        '/config/length/show/<id:\w+>'    => '/shopconfig/admin/length/view',
        '/config/length/remove/<id:\w+>'  => '/shopconfig/admin/length/delete',

        '/config/taxclass'                  => '/shopconfig/admin/taxclass' ,
        '/config/taxclass/index'            => '/shopconfig/admin/taxclass/index' ,
        '/config/taxclass/insert'           => '/shopconfig/admin/taxclass/create',
        '/config/taxclass/edit/<id:\w+>'    => '/shopconfig/admin/taxclass/update',
        '/config/taxclass/show/<id:\w+>'    => '/shopconfig/admin/taxclass/view',
        '/config/taxclass/remove/<id:\w+>'  => '/shopconfig/admin/taxclass/delete',

        '/config/taxrates'                  => '/shopconfig/admin/taxrates' ,
        '/config/taxrates/index'            => '/shopconfig/admin/taxrates/index' ,
        '/config/taxrates/insert'           => '/shopconfig/admin/taxrates/create',
        '/config/taxrates/edit/<id:\w+>'    => '/shopconfig/admin/taxrates/update',
        '/config/taxrates/show/<id:\w+>'    => '/shopconfig/admin/taxrates/view',
        '/config/taxrates/remove/<id:\w+>'  => '/shopconfig/admin/taxrates/delete',

        '/config/zones'                  => '/shopconfig/admin/zones' ,
        '/config/zones/index'            => '/shopconfig/admin/zones/index' ,
        '/config/zones/insert'           => '/shopconfig/admin/zones/create',
        '/config/zones/edit/<id:\w+>'    => '/shopconfig/admin/zones/update',
        '/config/zones/show/<id:\w+>'    => '/shopconfig/admin/zones/view',
        '/config/zones/remove/<id:\w+>'  => '/shopconfig/admin/zones/delete',

        '/config/weight'                  => '/shopconfig/admin/weight' ,
        '/config/weight/index'            => '/shopconfig/admin/weight/index' ,
        '/config/weight/insert'           => '/shopconfig/admin/weight/create',
        '/config/weight/edit/<id:\w+>'    => '/shopconfig/admin/weight/update',
        '/config/weight/show/<id:\w+>'    => '/shopconfig/admin/weight/view',
        '/config/weight/remove/<id:\w+>'  => '/shopconfig/admin/weight/delete',

        '/config/currency'                  => '/shopconfig/admin/currency' ,
        '/config/currency/index'            => '/shopconfig/admin/currency/index' ,
        '/config/currency/insert'           => '/shopconfig/admin/currency/create',
        '/config/currency/edit/<id:\w+>'    => '/shopconfig/admin/currency/update',
        '/config/currency/show/<id:\w+>'    => '/shopconfig/admin/currency/view',
        '/config/currency/remove/<id:\w+>'  => '/shopconfig/admin/currency/delete',

        '/config/admin/shopstatus'                  => '/shopconfig/admin/shopstatus' ,
        '/config/admin/shopstatus/index'            => '/shopconfig/admin/shopstatus' ,
        '/config/admin/shopstatus/insert'           => '/shopconfig/admin/shopstatus/create',
        '/config/admin/shopstatus/edit/<id:\w+>'    => '/shopconfig/admin/shopstatus/update',
        '/config/admin/shopstatus/show/<id:\w+>'    => '/shopconfig/admin/shopstatus/view',
        '/config/admin/shopstatus/remove/<id:\w+>'  => '/shopconfig/admin/shopstatus/delete',

        '/config/admin/countries'                  => '/shopconfig/admin/countries' ,
        '/config/admin/countries/index'            => '/shopconfig/admin/countries' ,
        '/config/admin/countries/insert'           => '/shopconfig/admin/countries/create',
        '/config/admin/countries/edit/<id:\w+>'    => '/shopconfig/admin/countries/update',
        '/config/admin/countries/show/<id:\w+>'    => '/shopconfig/admin/countries/view',
        '/config/admin/countries/remove/<id:\w+>'  => '/shopconfig/admin/countries/delete',

        '/config/admin/geozones'                  => '/shopconfig/admin/geozones' ,
        '/config/admin/geozones/zone'             => '/shopconfig/admin/geozones/zone' ,
        '/config/admin/geozones/index'            => '/shopconfig/admin/geozones' ,
        '/config/admin/geozones/insert'           => '/shopconfig/admin/geozones/create',
        '/config/admin/geozones/edit/<id:\w+>'    => '/shopconfig/admin/geozones/update',
        '/config/admin/geozones/show/<id:\w+>'    => '/shopconfig/admin/geozones/view',
        '/config/admin/geozones/remove/<id:\w+>'  => '/shopconfig/admin/geozones/delete',


    ],
    'modules' => [
        'admin' => [
            'class' => 'common\modules\shopconfig\modules\admin\AdminModule',
            'layout' => '@app/themes/ace/views/layouts/main',
        ],
    ],

];
