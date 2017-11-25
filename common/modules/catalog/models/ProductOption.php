<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%product_option}}".
 *
 * @property string $product_option_id
 * @property string $product_id
 * @property string $option_id
 * @property string $option_value_id
 * @property string $value
 * @property string $quantity
 * @property string $price
 * @property string $price_prefix
 * @property string $weight
 * @property string $weight_prefix
 *
 * @property Product $product
 * @property Option $option
 * @property OptionValue $optionValue
 */
class ProductOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'option_id', 'option_value_id', 'value', 'quantity', 'price', 'price_prefix', 'weight', 'weight_prefix'], 'required'],
            [['product_id', 'option_id', 'option_value_id', 'quantity'], 'integer'],
            [['value'], 'string'],
            [['price', 'weight'], 'number'],
            [['price_prefix', 'weight_prefix'], 'string', 'max' => 1],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::className(), 'targetAttribute' => ['option_id' => 'option_id']],
            [['option_value_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionValue::className(), 'targetAttribute' => ['option_value_id' => 'option_value_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_option_id' => Yii::t('app', 'Product Option ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'option_id' => Yii::t('app', 'Option ID'),
            'option_value_id' => Yii::t('app', 'Option Value ID'),
            'value' => Yii::t('app', 'Value'),
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'price_prefix' => Yii::t('app', 'Price Prefix'),
            'weight' => Yii::t('app', 'Weight'),
            'weight_prefix' => Yii::t('app', 'Weight Prefix'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
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
    public function getOptionValue()
    {
        return $this->hasOne(OptionValue::className(), ['option_value_id' => 'option_value_id']);
    }
}
