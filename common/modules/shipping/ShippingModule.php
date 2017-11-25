<?php

namespace common\modules\shipping;
use \Yii;

/**
 * shipping module definition class
 */
class ShippingModule extends \yii\base\Module
{

    public  $menu_items = [];

    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\shipping\controllers';

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
                'label' => '<i class="fa fa-user" aria-hidden="true"></i><span class="menu-text"> ' . Yii::t('app', 'Shipping').'</span>',
                'url' => '#',
                'linkOptions' => ['class'=>'menu-text'],
                'items' => [
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'city transport'),'url' => ['/shipping/citytransport'],],

                ],
                'itemOptions'=> ['class'=>'itemOptions'] ,
                'template'=> '<a href="{url}" class="dropdown-toggle">{label}</a>',
                'submenuTemplate' => "\n<ul class=\"submenu\">\n{items}\n</ul>\n"
            ],
        ];
    }
}
