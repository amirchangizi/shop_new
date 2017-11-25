<?php
/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 11/4/2017
 * Time: 11:41 AM
 */

namespace common\helpers;

use common\modules\shopconfig\models\Countries;
use common\modules\shopconfig\models\Zones;
use phpDocumentor\Reflection\Types\Integer;
use yii\base\Component;
use yii\helpers\ArrayHelper;


class ZoneHelper  extends Component
{

    public static function getByValue()
    {
        return ArrayHelper::map(Zones::find()->all() ,'zone_id' ,'zone_name');
    }

    public static function getByName()
    {
        return ArrayHelper::map(Zones::find()->all() ,'zone_id' ,'zone_id');
    }

    public static function getCountry()
    {
        return ArrayHelper::map(Countries::find()->all() ,'countries_id' ,'countries_name') ;
    }

    /***
     * @param Integer $countryId
     * @return array of zone
     */
    public static function getZoneByCountry($countryId)
    {

        return ArrayHelper::map(Zones::find()->where(['zone_country_id'=>$countryId])->all() ,'zone_id' ,'zone_name');

    }


}