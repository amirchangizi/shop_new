<?php

namespace common\modules\catalog\modules\admin;
use \Yii;

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
    public $controllerNamespace = 'common\modules\catalog\modules\admin\controllers';

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
                'label' => '<i class="fa fa-user" aria-hidden="true"></i><span class="menu-text"> ' . Yii::t('app', 'Catalog').'</span>',
                'url' => '#',
                'linkOptions' => ['class'=>'menu-text'],
                'items' => [
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'category'),'url' => ['/catalog/admin/category'],],
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'product'),'url' => ['/catalog/admin/product'],],

                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'Option'),'url' => ['/catalog/admin/option'],],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'manufacturer'),'url' => ['/catalog/admin/manufacturers']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'information'),'url' => ['/catalog/admin/information']],

                ],
                'itemOptions'=> ['class'=>'itemOptions'] ,
                'template'=> '<a href="{url}" class="dropdown-toggle">{label}</a>',
                'submenuTemplate' => "\n<ul class=\"submenu\">\n{items}\n</ul>\n"
            ],
        ];
    }

}
