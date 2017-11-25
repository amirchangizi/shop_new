<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%product_related}}".
 *
 * @property string $product_id
 * @property string $related_id
 *
 * @property Product $product
 * @property Product $related
 */
class ProductRelated extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_related}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['product_id', 'related_id'], 'integer'],
            [['product_id', 'related_id'], 'unique', 'targetAttribute' => ['product_id', 'related_id'], 'message' => 'The combination of Product ID and Related ID has already been taken.'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['related_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['related_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'related_id' => Yii::t('app', 'Related ID'),
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
    public function getRelated()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'related_id']);
    }
}
