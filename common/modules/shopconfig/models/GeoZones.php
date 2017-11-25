<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%geo_zones}}".
 *
 * @property string $geo_zone_id
 * @property string $geo_zone_name
 * @property string $geo_zone_description
 * @property string $last_modified
 * @property string $date_added
 *
 * @property ZonesToGeoZones[] $zonesToGeoZones
 */
class GeoZones extends \yii\db\ActiveRecord
{

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_added',
                'updatedAtAttribute' => 'last_modified',
                'value' => time(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%geo_zones}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['geo_zone_name'], 'required'],
            [['last_modified', 'date_added'], 'integer'],
            [['geo_zone_name'], 'string', 'max' => 32],
            [['geo_zone_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'geo_zone_id' => Yii::t('app', 'Geo Zone ID'),
            'geo_zone_name' => Yii::t('app', 'Geo Zone Name'),
            'geo_zone_description' => Yii::t('app', 'Geo Zone Description'),
            'last_modified' => Yii::t('app', 'Last Modified'),
            'date_added' => Yii::t('app', 'Date Added'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZonesToGeoZones()
    {
        return $this->hasMany(ZonesToGeoZones::className(), ['geo_zone_id' => 'geo_zone_id']);
    }
}
