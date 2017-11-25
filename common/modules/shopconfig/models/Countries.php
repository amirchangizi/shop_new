<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%countries}}".
 *
 * @property string $countries_id
 * @property string $countries_name
 * @property string $countries_iso_code_2
 * @property string $countries_iso_code_3
 *
 * @property Coupon[] $coupons
 * @property Zones[] $zones
 * @property ZonesToGeoZones[] $zonesToGeoZones
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%countries}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countries_name', 'countries_iso_code_2', 'countries_iso_code_3'], 'required'],
            [['countries_name'], 'string', 'max' => 255],
            [['countries_iso_code_2'], 'string', 'max' => 2],
            [['countries_iso_code_3'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'countries_id' => Yii::t('app', 'Countries ID'),
            'countries_name' => Yii::t('app', 'Countries Name'),
            'countries_iso_code_2' => Yii::t('app', 'Countries Iso Code 2'),
            'countries_iso_code_3' => Yii::t('app', 'Countries Iso Code 3'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupons()
    {
        return $this->hasMany(Coupon::className(), ['country_id' => 'countries_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZones()
    {
        return $this->hasMany(Zones::className(), ['zone_country_id' => 'countries_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZonesToGeoZones()
    {
        return $this->hasMany(ZonesToGeoZones::className(), ['zone_country_id' => 'countries_id']);
    }
}
