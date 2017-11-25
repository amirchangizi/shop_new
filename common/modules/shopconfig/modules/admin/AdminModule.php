<?php

namespace common\modules\shopconfig\modules\admin;

use \Yii ;

/**
 * admin module definition class
 */
class AdminModule extends \yii\base\Module
{

    public  $menu_items = [];

    public $layout = 'main';


    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\shopconfig\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->menu_items = $this->menuItems() ;

        parent::init();

        // custom initialization code goes here
    }

    /**
     * For Menu
     *
     * @return array
     */
    public static function menuItems()
    {
        return [
            [
                'label' => '<i class="fa fa-user" aria-hidden="true"></i><span class="menu-text"> ' . Yii::t('app', 'Shop Configuration').'</span>',
                'url' => '#',
                'linkOptions' => ['class'=>'menu-text'],
                'items' => [
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'Setting'),'url' => ['/shopconfig/admin/settings'],],
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'Shop status'),'url' => ['/shopconfig/admin/shopstatus'],],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'country'),'url' => ['/shopconfig/admin/countries']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'zone'),'url' => ['/shopconfig/admin/zones']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'geo zone'),'url' => ['/shopconfig/admin/geozones']],
                    [
                        'label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'tax'),
                        'items' => [
                            ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'Tax Class'),'url' => ['/shopconfig/admin/taxclass'],],
                            ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'Tax Rate'),'url' => ['/shopconfig/admin/taxrates'],],
                        ],
                        'itemOptions'=> ['class'=>'itemOptions'] ,
                        'template'=> '<a href="{url}" class="dropdown-toggle">{label}</a>',
                        'submenuTemplate' => "\n<ul class=\"submenu\">\n{items}\n</ul>\n"
                    ],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'currency'),'url' => ['/shopconfig/admin/currency']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'length class'),'url' => ['/shopconfig/admin/length']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'weight class'),'url' => ['/shopconfig/admin/weight']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'Language'),'url' => ['/shopconfig/admin/language']],

                ],
                'itemOptions'=> ['class'=>'itemOptions'] ,
                'template'=> '<a href="{url}" class="dropdown-toggle">{label}</a>',
                'submenuTemplate' => "\n<ul class=\"submenu\">\n{items}\n</ul>\n"
            ],
        ];
    }
}
