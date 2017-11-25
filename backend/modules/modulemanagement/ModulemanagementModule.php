<?php

namespace app\modules\modulemanagement;
use \Yii;

/**
 * module-management module definition class
 */
class ModulemanagementModule extends \yii\base\Module
{

    public $layout ='users' ;

    public $module_table = '{{%modules}}';

    public  $menu_items = [];
    public  $config_action ;




    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\modulemanagement\controllers';

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
                'label' => ' ' . static::t('user', 'Module Management').'</span>',
                'url' => '',
                'linkOptions' => ['class'=>'menu-text'],
                'items' => [
                    ['label' => ' ' . static::t('user', 'Module'),'url' => ['/module/index'],],
                   // ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . static::t('user', 'User Groups'),'url' => ['/users/groups']],
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


        return Yii::t('modules/UserManagement/'.$category, $message, $params, $language);
    }

}
