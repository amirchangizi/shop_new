<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 04/12/2017
 * Time: 12:55
 */

namespace frontend\widgets;

use common\helpers\CategoryHelper;
use Yii;
use yii\base\Widget;
use common\modules\catalog\models\Category;


class MenuWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $menuList = CategoryHelper::getAllMenu() ;
        $menu = [] ;

        foreach ($menuList as $menuInfo)
        {
            if(isset($menu[$menuInfo->parent_id]))
            {

                $menu[$menuInfo->parent_id]['child'][$menuInfo->category_id] = [
                    'name' => $menuInfo->name
                ] ;
                continue ;
            }

            $menu[$menuInfo->category_id] = [
                'name' => $menuInfo->name
            ] ;

        }

        return $this->render('menu',compact('menu')) ;


    }

}