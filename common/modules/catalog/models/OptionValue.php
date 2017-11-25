<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%option_value}}".
 *
 * @property string $option_value_id
 * @property string $option_id
 * @property string $name
 * @property string $image
 * @property string $sort_order
 *
 * @property CustomersBasketAttributes[] $customersBasketAttributes
 * @property Option $option
 * @property OrdersProductsOptions[] $ordersProductsOptions
 * @property ProductOption[] $productOptions
 */
class OptionValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%option_value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['option_id', 'sort_order'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 255],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::className(), 'targetAttribute' => ['option_id' => 'option_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_value_id' => Yii::t('app', 'Option Value ID'),
            'option_id' => Yii::t('app', 'Option ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomersBasketAttributes()
    {
        return $this->hasMany(CustomersBasketAttributes::className(), ['products_options_value_id' => 'option_value_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Option::className(), ['option_id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersProductsOptions()
    {
        return $this->hasMany(OrdersProductsOptions::className(), ['products_options_values' => 'option_value_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['option_value_id' => 'option_value_id']);
    }

    public static function deleteByIDs($ids)
    {
        $ids = array_keys($ids);
        self::deleteByIDs($ids) ;
    }
}
