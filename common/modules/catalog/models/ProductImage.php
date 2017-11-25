<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%product_image}}".
 *
 * @property string $product_image_id
 * @property string $product_id
 * @property string $image
 * @property string $sort_order
 *
 * @property Product $product
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'sort_order'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_image_id' => Yii::t('app', 'Product Image ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'image' => Yii::t('app', 'Image'),
            'sort_order' => Yii::t('app', 'Sort Order'),
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
