<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%currency}}".
 *
 * @property string $currency_id
 * @property string $currency_title
 * @property string $currency_name
 * @property double $currency_value
 * @property string $currency_min
 * @property string $currency_max
 * @property string $currency_last_update
 * @property integer $is_default
 * @property string $currency_symbol
 * @property integer $currency_possition
 * @property integer $decimal_placement
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%currency}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_title', 'currency_name', 'currency_value'], 'required'],
            [['currency_value'], 'number'],
            [['currency_min', 'currency_max', 'currency_last_update', 'is_default', 'currency_possition', 'decimal_placement'], 'integer'],
            [['currency_title'], 'string', 'max' => 25],
            [['currency_name'], 'string', 'max' => 10],
            [['currency_symbol'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'currency_id' => Yii::t('app', 'Currency ID'),
            'currency_title' => Yii::t('app', 'Currency Title'),
            'currency_name' => Yii::t('app', 'Currency Name'),
            'currency_value' => Yii::t('app', 'Currency Value'),
            'currency_min' => Yii::t('app', 'Currency Min'),
            'currency_max' => Yii::t('app', 'Currency Max'),
            'currency_last_update' => Yii::t('app', 'Currency Last Update'),
            'is_default' => Yii::t('app', 'Is Default'),
            'currency_symbol' => Yii::t('app', 'Currency Symbol'),
            'currency_possition' => Yii::t('app', 'Currency Possition'),
            'decimal_placement' => Yii::t('app', 'Decimal Placement'),
        ];
    }
}
