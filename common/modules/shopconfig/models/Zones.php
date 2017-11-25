<?php

namespace common\modules\shopconfig\models;

use common\helpers\ZoneHelper;
use Yii;

/**
 * This is the model class for table "{{%zones}}".
 *
 * @property string $zone_id
 * @property string $zone_country_id
 * @property string $zone_code
 * @property string $zone_name
 *
 * @property TaxRates[] $taxRates
 * @property Countries $zoneCountry
 * @property ZonesToGeoZones[] $zonesToGeoZones
 */
class Zones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zones}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone_country_id', 'zone_code', 'zone_name'], 'required'],
            [['zone_country_id'], 'integer'],

            ['zone_country_id', 'in', 'range' => ZoneHelper::getCountry()],

            [['zone_code'], 'string', 'max' => 32],
            [['zone_name'], 'string', 'max' => 255],
            //[['zone_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['zone_country_id' => 'countries_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zone_id' => Yii::t('app', 'Zone ID'),
            'zone_country_id' => Yii::t('app', 'Zone Country'),
            'zone_code' => Yii::t('app', 'Zone Code'),
            'zone_name' => Yii::t('app', 'Zone Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxRates()
    {
        return $this->hasMany(TaxRates::className(), ['tax_zone_id' => 'zone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZoneCountry()
    {
        return $this->hasOne(Countries::className(), ['countries_id' => 'zone_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZonesToGeoZones()
    {
        return $this->hasMany(ZonesToGeoZones::className(), ['zone_id' => 'zone_id']);
    }
}
