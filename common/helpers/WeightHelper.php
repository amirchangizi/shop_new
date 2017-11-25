<?php

namespace common\helpers;

use common\modules\shopconfig\models\WeightClass;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class WeightHelper extends Component
{

    public static function getWeight()
    {
        return ArrayHelper::map(WeightClass::find()->where(['language_id'=>Yii::$app->language])->all() ,'weight_class_id' ,'title');
    }

    public static function getWeightById()
    {
        return ArrayHelper::map(WeightClass::find()->where(['language_id'=>Yii::$app->language])->all() ,'weight_class_id' ,'weight_class_id');
    }

}