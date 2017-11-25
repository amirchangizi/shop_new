<?php
/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 11/4/2017
 * Time: 11:42 AM
 */

namespace common\helpers;

use common\modules\shopconfig\models\TaxClass;
use common\modules\shopconfig\models\TaxRates;
use phpDocumentor\Reflection\Types\Integer;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class TaxHelper extends Component
{

    public static function getByValue()
    {
        return ArrayHelper::map(TaxClass::find()->all() ,'tax_class_id' ,'tax_class_title');
    }

    public static function getByName()
    {
        return ArrayHelper::map(TaxClass::find()->all() ,'tax_class_id' ,'tax_class_id');
    }

    /***
     * @param Integer $classId
     * @return array of tax rate
     */
    public static function getRateByClass($classId)
    {
        return ArrayHelper::map(TaxRates::find()->where(['tax_class_id'=>$classId])->orderBy(['tax_priority'=>SORT_ASC])->all() ,'tax_rates_id' ,'tax_rate');
    }

    /***
     * @param Integer $classId
     * @param Integer $zoneId
     * @return array of tax rate
     */
    public static function getRateByClassVsZone($classId ,$zoneId)
    {
        return ArrayHelper::map(TaxRates::find()->where(['tax_class_id'=>$classId ,'tax_zone_id'=>$zoneId])->orderBy(['tax_priority'=>SORT_ASC])->all() ,'tax_rates_id' ,'tax_rate');
    }


}