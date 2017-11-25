<?php

namespace common\modules\shopconfig;

use \Yii ;
use yii\base\Module;

/**
 * shopconfig module definition class
 */
class ShopconfigModule extends Module
{

    public  $menu_items = [];


    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\shopconfig\controllers';

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
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'User'),'url' => [''],],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'User Groups'),'url' => ['']],

                ],
                'itemOptions'=> ['class'=>'itemOptions'] ,
                'template'=> '<a href="{url}" class="dropdown-toggle">{label}</a>',
                'submenuTemplate' => "\n<ul class=\"submenu\">\n{items}\n</ul>\n"
            ],
        ];
    }

    /**
     * I18N helper
     *
     * @param string      $category
     * @param string      $message
     * @param array       $params
     * @param null|string $language
     *
     * @return string
     */
    public static function t($category, $message, $params = [], $language = null)
    {

        if(is_null($language))
            $language = Yii::$app->language ;


        return Yii::t('modules/customermanagement/'.$category, $message, $params, $language);
    }

}
