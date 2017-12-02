<?php
/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 9/21/2017
 * Time: 12:45 AM
 */

use common\models\Modules;

$activeModules = Modules::find()->where(['position'=>'common'])->all();


$modulesList = [];

$i = 0 ;
if($activeModules)
    //return $activeModules ;
    foreach ($activeModules as $module)
    {
        $moduleConfig = $module->config ;

        if(is_null($module->config) || empty($module->config))
            $moduleConfig = $i ;

        $modulesList[$moduleConfig] = $module->module_name;
        $i++ ;
    }




return $modulesList;