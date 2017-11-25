<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%option}}".
 *
 * @property string $option_id
 * @property string $type
 * @property string $sort_order
 * @property string $name
 * @property string $language_id
 *
 * @property CustomersBasketAttributes[] $customersBasketAttributes
 * @property OptionValue[] $optionValues
 * @property OrdersProductsOptions[] $ordersProductsOptions
 * @property ProductOption[] $productOptions
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['sort_order'], 'integer'],
            [['type'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 128],
            [['language_id'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => Yii::t('app', 'Option ID'),
            'type' => Yii::t('app', 'Type'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'name' => Yii::t('app', 'Name'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomersBasketAttributes()
    {
        return $this->hasMany(CustomersBasketAttributes::className(), ['products_options_id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::className(), ['option_id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersProductsOptions()
    {
        return $this->hasMany(OrdersProductsOptions::className(), ['products_options' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['option_id' => 'option_id']);
    }
}
