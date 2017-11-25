<?php

namespace common\modules\catalog\models;

use common\modules\customermanagement\models\CustomerGroup;
use Yii;

/**
 * This is the model class for table "{{%product_discount}}".
 *
 * @property string $product_discount_id
 * @property string $product_id
 * @property string $customer_group_id
 * @property string $quantity
 * @property string $priority
 * @property string $price
 * @property string $date_start
 * @property string $date_end
 *
 * @property Product $product
 * @property CustomerGroup $customerGroup
 */
class ProductDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_discount}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'customer_group_id', 'date_start', 'date_end'], 'required'],
            [['product_id', 'customer_group_id', 'quantity', 'priority', 'date_start', 'date_end'], 'integer'],
            [['price'], 'number'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['customer_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerGroup::className(), 'targetAttribute' => ['customer_group_id' => 'customer_group_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_discount_id' => Yii::t('app', 'Product Discount ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'customer_group_id' => Yii::t('app', 'Customer Group ID'),
            'quantity' => Yii::t('app', 'Quantity'),
            'priority' => Yii::t('app', 'Priority'),
            'price' => Yii::t('app', 'Price'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
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
    public function getCustomerGroup()
    {
        return $this->hasOne(CustomerGroup::className(), ['customer_group_id' => 'customer_group_id']);
    }
}
