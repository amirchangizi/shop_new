<?php

namespace common\helpers;

use common\modules\shopconfig\models\LengthClass;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class LengthHelper extends Component
{

    public static function getLength()
    {
        return ArrayHelper::map(LengthClass::find()->where(['language_id'=>Yii::$app->language])->all(), 'length_class_id','title');
    }

    public static function getLengthById()
    {
        return ArrayHelper::map(LengthClass::find()->where(['language_id'=>Yii::$app->language])->all(), 'length_class_id','length_class_id');
    }

}