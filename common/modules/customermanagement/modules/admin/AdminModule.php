<?php

namespace common\modules\customermanagement\modules\admin;
use \common\modules\customermanagement\CustomermanagementModule;
use Yii;

/**
 * admin module definition class
 */
class AdminModule extends \yii\base\Module
{
    public $layout ='main' ;

    public  $menu_items = [];

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\customermanagement\modules\admin\controllers';

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
                'label' => '<i class="fa fa-user" aria-hidden="true"></i><span class="menu-text"> ' . Yii::t('app', 'Customers Management').'</span>',
                'url' => '',
                'linkOptions' => ['class'=>'menu-text'],
                'items' => [
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'Customer'),'url' => ['/customermanagement/admin/customers'],],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'Customers Category'),'url' => ['/customermanagement/admin/customergroup']],

                ],
                'itemOptions'=> ['class'=>'itemOptions'] ,
                'template'=> '<a href="{url}" class="dropdown-toggle">{label}</a>',
                'submenuTemplate' => "\n<ul class=\"submenu\">\n{items}\n</ul>\n"
            ],
        ];
    }


}
