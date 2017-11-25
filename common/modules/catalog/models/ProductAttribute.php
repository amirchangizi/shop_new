<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%product_attribute}}".
 *
 * @property string $product_attribute_id
 * @property string $product_id
 * @property string $attribute_name
 * @property string $attribute_desc
 *
 * @property Product $product
 */
class ProductAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'attribute_name', 'attribute_desc'], 'required'],
            [['product_id'], 'integer'],
            [['attribute_desc'], 'string'],
            [['attribute_name'], 'string', 'max' => 100],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_attribute_id' => Yii::t('app', 'Product Attribute ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'attribute_name' => Yii::t('app', 'Attribute Name'),
            'attribute_desc' => Yii::t('app', 'Attribute Desc'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
