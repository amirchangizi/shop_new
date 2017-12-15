<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 11/23/2017
 * Time: 11:25 PM
 */

namespace common\helpers;
use common\modules\catalog\models\Information;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class InformationHelper extends Component
{

    public static function getBottomInformation($limit = 4)
    {
        return ArrayHelper::map(Information::find()->where(['bottom'=>true ,'status'=>true,'language_id'=> Yii::$app->language])->limit($limit)->orderBy(['information_id' => SORT_DESC])->all() ,'information_id' ,'title') ;
    }

    public static function getAllInformation()
    {
        return ArrayHelper::map(Information::find()->where(['status'=>true,'language_id'=> Yii::$app->language])->all() ,'information_id' ,'title') ;
    }

    public static function getInformation($informationId)
    {
        return Information::find()->where(['information_id'=>$informationId ,'status'=>true,'language_id'=> Yii::$app->language])->one() ;
    }
}