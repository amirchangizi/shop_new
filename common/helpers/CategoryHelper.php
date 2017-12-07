<?php
/**
 * User: amir changizi
 * Date: 11/4/2017
 * Time: 11:42 PM
 */

namespace common\helpers;

use common\modules\catalog\models\Category;
use yii\base\Component;
use yii\helpers\ArrayHelper;


class CategoryHelper extends Component
{

    public static function getAllCategory()
    {
        return ArrayHelper::map(Category::find()->orderBy(['lft'=>SORT_ASC])->all() ,'name' ,'name');
    }

    public static function getAllCategoryWithoutRoot()
    {
        return ArrayHelper::map(Category::find()->where(['>','category_id', 1])->orderBy(['lft'=>SORT_ASC])->all() ,'name' ,'name');
    }

    public static function getAllCategoryIdWithoutRoot()
    {
        return ArrayHelper::map(Category::find()->where(['>','category_id', 1])->orderBy(['lft'=>SORT_ASC])->all() ,'category_id' ,'name');
    }

    public static function getAllCategoryId()
    {
        return ArrayHelper::map(Category::find()->orderBy(['lft'=>SORT_ASC])->all() ,'category_id' ,'category_id');
    }

    public static function getCategory()
    {
        return ArrayHelper::map(Category::find()->orderBy(['lft'=>SORT_ASC])->all() ,'category_id' ,'name');
    }


    public static function getCategoryWithoutName($categoryName)
    {
        $ids = self::findByName($categoryName) ;
        return ArrayHelper::map(Category::find()->where(['not in','category_id',$ids])->all() ,'name' ,'name');
    }

    protected static function findByName($name)
    {
        $ids = []  ;
        $parent = Category::findOne(['name' => $name]) ;
        if($parent)
        {
            $child = $parent->leaves()->all();
            $ids = ArrayHelper::map($child ,'category_id' ,'category_id') ;
        }

        $ids = ArrayHelper::merge($ids ,[$parent->category_id]) ;

        return $ids ;
    }

    public static function getAllMenu()
    {
        return Category::find()->where(['>','category_id', 1])->andWhere(['status'=>true , 'language_id'=>\Yii::$app->language])->orderBy(['lft'=>SORT_ASC])->all();
    }

}