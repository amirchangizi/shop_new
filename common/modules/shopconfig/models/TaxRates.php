<?php

namespace common\modules\shopconfig\models;

use common\helpers\TaxHelper;
use common\helpers\ZoneHelper;
use Yii;

/**
 * This is the model class for table "{{%tax_rates}}".
 *
 * @property string $tax_rates_id
 * @property string $tax_zone_id
 * @property string $tax_class_id
 * @property string $tax_priority
 * @property string $tax_rate
 * @property string $tax_description
 * @property string $date_modified
 * @property string $date_added
 *
 * @property Zones $taxZone
 * @property TaxClass $taxClass
 */
class TaxRates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tax_rates}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_zone_id', 'tax_class_id', 'tax_rate', 'tax_description'], 'required'],
            [['tax_zone_id', 'tax_class_id', 'tax_priority', 'date_modified', 'date_added'], 'integer'],

            ['tax_class_id', 'in', 'range' => TaxHelper::getByName()],
            ['tax_zone_id', 'in', 'range' => ZoneHelper::getByName()],

            [['tax_rate'], 'number'],
            [['tax_description'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tax_rates_id' => Yii::t('app', 'Tax Rates ID'),
            'tax_zone_id' => Yii::t('app', 'Tax Zone'),
            'tax_class_id' => Yii::t('app', 'Tax Class'),
            'tax_priority' => Yii::t('app', 'Tax Priority'),
            'tax_rate' => Yii::t('app', 'Tax Rate'),
            'tax_description' => Yii::t('app', 'Tax Description'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'date_added' => Yii::t('app', 'Date Added'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxZone()
    {
        return $this->hasOne(Zones::className(), ['zone_id' => 'tax_zone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxClass()
    {
        return $this->hasOne(TaxClass::className(), ['tax_class_id' => 'tax_class_id']);
    }
}
