<?php
/**
 * User: amir changizi
 * Date: 11/5/2017
 * Time: 12:45 PM
 */
namespace common\helpers;

use \Yii ;
use common\modules\shopconfig\models\ShopStatus;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class ShopstatusHelper extends Component
{

    public static function getStatusBySection($section ,$language = null)
    {
        if(is_null($language))
            return ArrayHelper::map(ShopStatus::find()->where(['status_section'=>$section ,'language_id'=> Yii::$app->language])->all() ,'status_id' ,'status_name') ;

        return ArrayHelper::map(ShopStatus::find()->where(['status_section'=>$section ,'language_id'=> $language ])->all() ,'status_id' ,'status_name') ;
    }

    public static function getStatus($language = null)
    {
        if(is_null($language))
            return ArrayHelper::map(ShopStatus::find()->where(['language_id'=> Yii::$app->language])->all() ,'status_id' ,'status_name') ;

        return ArrayHelper::map(ShopStatus::find()->where(['language_id'=> $language ])->all() ,'status_id' ,'status_name') ;
    }



}