<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%zones_to_geo_zones}}".
 *
 * @property string $association_id
 * @property string $zone_country_id
 * @property string $zone_id
 * @property string $geo_zone_id
 * @property string $date_modified
 * @property string $date_added
 *
 * @property Countries $zoneCountry
 * @property Zones $zone
 * @property GeoZones $geoZone
 */
class ZonesToGeoZones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zones_to_geo_zones}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone_country_id', 'date_added'], 'required'],
            [['zone_country_id', 'zone_id', 'geo_zone_id', 'date_modified', 'date_added'], 'integer'],
            [['zone_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['zone_country_id' => 'countries_id']],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zones::className(), 'targetAttribute' => ['zone_id' => 'zone_id']],
            [['geo_zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoZones::className(), 'targetAttribute' => ['geo_zone_id' => 'geo_zone_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'association_id' => Yii::t('app', 'Association ID'),
            'zone_country_id' => Yii::t('app', 'Zone Country ID'),
            'zone_id' => Yii::t('app', 'Zone ID'),
            'geo_zone_id' => Yii::t('app', 'Geo Zone ID'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'date_added' => Yii::t('app', 'Date Added'),
        ];
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
    public function getZone()
    {
        return $this->hasOne(Zones::className(), ['zone_id' => 'zone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoZone()
    {
        return $this->hasOne(GeoZones::className(), ['geo_zone_id' => 'geo_zone_id']);
    }
}
