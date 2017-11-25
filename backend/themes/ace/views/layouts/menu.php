<?php


use app\models\Modules;
use yii\widgets\Menu;

$menuItems = [
    [
        'label' => '<i class="menu-icon fa fa-tachometer"></i> '.Yii::t('app','Dashboard'),
        'url' => ['/site/index'] ,'linkOptions' => ['class'=>'menu-text']
    ],
];

$activeModules = Modules::find()->orderBy(['ordering'=>SORT_ASC])->all();

$modulesMenu = [];
//echo '<pre>';

if($activeModules)
    foreach ($activeModules as $module)
    {

        if(Yii::$app->hasModule($module->module_name))
        {
            $getBaseModule = Yii::$app->getModule($module->module_name) ;
            if($getSubModule = $getBaseModule->getModule('admin'))
                $modulesMenu = $getSubModule->menu_items ;
            else
                $modulesMenu = $getBaseModule->menu_items ;

        }

        if(count($modulesMenu) > 0)
        {
            $menuItems = array_merge($menuItems,$modulesMenu) ;
        }
        $modulesMenu = null ;

    }

echo Menu::widget([
    'options' => ['class' => 'nav nav-list'],
    'encodeLabels'=>false,
    'activateParents'=>true,
    'items' => $menuItems
]);



?>