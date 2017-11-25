<?php
/**
 * User: amir changizi
 * Date: 10/29/2017
 * Time: 10:32 PM
 */
namespace common\helpers;

use common\models\enums\ActivateStatus;
use common\modules\shopconfig\models\Language;
use phpDocumentor\Reflection\Types\Boolean;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class LanguageHelper extends Component
{

    /**
     * @return array of language id and language name
     */
    public static function getByValue()
    {
        return ArrayHelper::map(Language::find()->where(['status'=>ActivateStatus::ACTIVE])->all(),'language_id','language');
    }

    /***
     * @return array of language id
     */
    public static function getByName()
    {
        return ArrayHelper::map(Language::find()->where(['status'=>ActivateStatus::ACTIVE])->all(),'language_id','language_id');
    }

    /***
     * @param Boolean $RtlType
     * @return array of rtl or ltr language
     */
    public static function getByRtl($RtlType = 0 )
    {
        return ArrayHelper::map(Language::find()->where(['is_rtl'=>$RtlType])->all(),'language_id','language');
    }
}
