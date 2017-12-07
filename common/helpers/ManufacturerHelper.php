<?php
/**
 * User: amir changizi
 * Date: 11/5/2017
 * Time: 12:45 PM
 */
namespace common\helpers;

use \Yii ;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use common\modules\catalog\models\Manufacturers;

class ManufacturerHelper extends Component
{

    public static function getManufacturer()
    {
        return ArrayHelper::map(Manufacturers::find()->all() ,'manufacturers_id' ,'manufacturers_name') ;
    }

    public static function getManufacturerById($manufacturerId)
    {
        return Manufacturers::find()->where(['manufacturers_id'=>$manufacturerId])->all();
    }

    public static function getAllManufacturer()
    {
        return Manufacturers::find()->all()  ;
    }

}