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

    protected function getChilds($parent_id = 0)
    {
        $child_cates = Category::find()->where(['parent_id' => $parent_id, 'status' => true, 'language_id' => Yii::$app->language])->orderBy(['lft' => SORT_ASC])->all();
        $cates = '';

        if (!$child_cates)
            return null;

        $cates .= '<ul>';
        foreach ($child_cates as $k => $cate) {
            $cates .= '<li><a href="'. Yii::$app->urlManager->createUrl(['product/category' ,'categoryId'=> $cate->category_id ]).'">' . $cate->name . '</a></li>';
        }
        $cates .= '</ul>';
        return $cates;
    }

    protected function cateParent($parent_id = 0)
    {
        $child_cates = Category::find()->where(['parent_id' => $parent_id, 'status' => true, 'language_id' => Yii::$app->language])->orderBy(['lft' => SORT_ASC])->all();

        if (!$child_cates)
            return null;

        foreach ($child_cates as $key => $child) {
            $menu = '<ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>' . $child->name . '</h5>';
            $chld = $this->getChilds($parent_id);
            $menu .= $chld;
            $menu .= '</div></div></div></li></ul>';
        }
        return $menu;
    }

    public function run()
    {
        $parent_cates = Category::find()->Where(['parent_id' => 1, 'status' => true, 'language_id' => Yii::$app->language])->orderBy(['lft' => SORT_ASC])->all();

        $main_menu = '<div class="navbar-collapse collapse" id="navigation"><ul class="nav navbar-nav navbar-left">';
        $main_menu.='<li class="active"><a href="index.html">'. Yii::t('app','Home').'</a></li>';
        foreach ($parent_cates as $key => $item) {

            $cateparent = $this->cateParent($item->category_id);
            if (is_null($cateparent))
                $main_menu .= '<li class="active"><a href="">' . $item->name . '</a>';
            else {
                $main_menu .= '<li class="dropdown yamm-fw">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">' . $item->name . '<b class="caret"></b></a>';
                $main_menu .= $cateparent;
            }

            $main_menu .= '</li>';
        }
        $main_menu .= ' </ul></div>';
        return $main_menu;


    }

}