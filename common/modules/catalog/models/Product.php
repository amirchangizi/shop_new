<?php

namespace common\modules\catalog\models;

use common\modules\shopconfig\models\LengthClass;
use common\modules\shopconfig\models\TaxClass;
use common\modules\shopconfig\models\WeightClass;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $product_id
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $model
 * @property string $sku
 * @property string $upc
 * @property string $ean
 * @property string $jan
 * @property string $isbn
 * @property string $mpn
 * @property string $quantity
 * @property string $stock_status_id
 * @property string $image
 * @property string $manufacturer_id
 * @property integer $shipping
 * @property string $price
 * @property string $tax_class_id
 * @property integer $date_available
 * @property integer $date_expire
 * @property string $weight
 * @property string $weight_class_id
 * @property string $length
 * @property string $width
 * @property string $height
 * @property string $length_class_id
 * @property integer $Special
 * @property integer $subtract
 * @property string $minimum
 * @property string $sort_order
 * @property integer $status
 * @property string $viewed
 * @property string $date_added
 * @property string $date_modified
 * @property string $language_id
 *
 * @property CouponProduct[] $couponProducts
 * @property Coupon[] $coupons
 * @property CustomersBasketAttributes[] $customersBasketAttributes
 * @property OrdersProducts[] $ordersProducts
 * @property OrdersProductsOptions[] $ordersProductsOptions
 * @property Manufacturers $manufacturer
 * @property TaxClass $taxClass
 * @property WeightClass $weightClass
 * @property LengthClass $lengthClass
 * @property ProductAttribute[] $productAttributes
 * @property ProductDiscount[] $productDiscounts
 * @property ProductImage[] $productImages
 * @property ProductOption[] $productOptions
 * @property ProductRelated[] $productRelateds
 * @property ProductRelated[] $productRelateds0
 * @property Product[] $relateds
 * @property Product[] $products
 * @property ProductToCategory[] $productToCategories
 * @property Category[] $categories
 * @property Returns[] $returns
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'model', 'stock_status_id','quantity' ,'price','weight' ,'weight_class_id' ,'length' ,'length_class_id' ,'manufacturer_id'], 'required'],
            [['name'] ,'unique'],
            [['description', 'tag'], 'string'],
            [['quantity', 'stock_status_id', 'manufacturer_id', 'shipping', 'tax_class_id', 'date_available', 'date_expire', 'weight_class_id', 'length_class_id', 'Special', 'subtract', 'minimum', 'sort_order', 'status', 'viewed', 'date_added', 'date_modified'], 'integer'],
            [['price', 'weight', 'length', 'width', 'height'], 'number'],
            [['name', 'meta_title', 'meta_description', 'meta_keyword', 'image'], 'string', 'max' => 255],
            [['model', 'sku', 'mpn'], 'string', 'max' => 64],
            [['upc'], 'string', 'max' => 12],
            [['ean'], 'string', 'max' => 14],
            [['jan'], 'string', 'max' => 13],
            [['isbn'], 'string', 'max' => 17],
            [['language_id'], 'string', 'max' => 5],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturers::className(), 'targetAttribute' => ['manufacturer_id' => 'manufacturers_id']],
            [['tax_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaxClass::className(), 'targetAttribute' => ['tax_class_id' => 'tax_class_id']],
            [['weight_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => WeightClass::className(), 'targetAttribute' => ['weight_class_id' => 'weight_class_id']],
            [['length_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => LengthClass::className(), 'targetAttribute' => ['length_class_id' => 'length_class_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'tag' => Yii::t('app', 'Tag'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_keyword' => Yii::t('app', 'Meta Keyword'),
            'model' => Yii::t('app', 'Model'),
            'sku' => Yii::t('app', 'Sku'),
            'upc' => Yii::t('app', 'Upc'),
            'ean' => Yii::t('app', 'Ean'),
            'jan' => Yii::t('app', 'Jan'),
            'isbn' => Yii::t('app', 'Isbn'),
            'mpn' => Yii::t('app', 'Mpn'),
            'quantity' => Yii::t('app', 'Quantity'),
            'stock_status_id' => Yii::t('app', 'Stock Status ID'),
            'image' => Yii::t('app', 'Image'),
            'manufacturer_id' => Yii::t('app', 'Manufacturer ID'),
            'shipping' => Yii::t('app', 'Shipping'),
            'price' => Yii::t('app', 'Price'),
            'tax_class_id' => Yii::t('app', 'Tax Class ID'),
            'date_available' => Yii::t('app', 'Date Available'),
            'date_expire' => Yii::t('app', 'Date Expire'),
            'weight' => Yii::t('app', 'Weight'),
            'weight_class_id' => Yii::t('app', 'Weight Class ID'),
            'length' => Yii::t('app', 'Length'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'length_class_id' => Yii::t('app', 'Length Class ID'),
            'Special' => Yii::t('app', 'Special'),
            'subtract' => Yii::t('app', 'Subtract'),
            'minimum' => Yii::t('app', 'Minimum'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'status' => Yii::t('app', 'Status'),
            'viewed' => Yii::t('app', 'Viewed'),
            'date_added' => Yii::t('app', 'Date Added'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }

    public function saveDiscount($model , $post ,$productId)
    {
//        if($allDiscount = ArrayHelper::map(ProductDiscount::findAll(['product_id'=>$productId]),'product_discount_id' ,'product_id'))
//        {
//            $diff = array_diff( $allDiscount , $post['category_id']) ;
//            if(count($diff) > 0)
//                ProductToCategory::deleteAll(['in' ,'category_id' ,$diff ]) ;
//        }

        foreach ($post as $attributes)
        {
            $discount = clone $model ;
            $discount->attributes = $attributes ;
            $discount->product_id = $productId ;
            if(!$discount->save())
                continue ;
        }

    }

    public function saveCategory($model ,$post ,$productId)
    {

        if($allCat = ArrayHelper::map(ProductToCategory::findAll(['product_id'=>$productId]),'category_id' ,'category_id'))
        {
            $diff = array_diff( $allCat , $post['category_id']) ;
            if(count($diff) > 0)
                ProductToCategory::deleteAll(['in' ,'category_id' ,$diff ]) ;
        }

        foreach ($post['category_id'] as $value)
        {
            $cat = clone $model ;
            $cat->attributes = [
                'category_id' => $value ,
                'product_id' => $productId
            ] ;

            if(!$cat->save())
                continue ;

        }


    }

    public function saveRelated($model ,$post ,$productId)
    {

        if($allRel = ArrayHelper::map(ProductRelated::findAll(['product_id'=>$productId]),'related_id' ,'related_id'))
        {
            $diff = array_diff( $allRel , $post['related_id']) ;
            if(count($diff) > 0)
                ProductRelated::deleteAll(['in' ,'related_id' ,$diff ]) ;
        }

        foreach ($post['related_id'] as $value)
        {
            $related = clone $model ;
            $related->attributes = [
                'related_id' => $value ,
                'product_id' => $productId
            ] ;


            if(!$related->save())
                continue ;

        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getCouponProducts()
//    {
//        return $this->hasMany(CouponProduct::className(), ['product_id' => 'product_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getCoupons()
//    {
//        return $this->hasMany(Coupon::className(), ['coupon_id' => 'coupon_id'])->viaTable('{{%coupon_product}}', ['product_id' => 'product_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getCustomersBasketAttributes()
//    {
//        return $this->hasMany(CustomersBasketAttributes::className(), ['products_id' => 'product_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getOrdersProducts()
//    {
//        return $this->hasMany(OrdersProducts::className(), ['product_id' => 'product_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getOrdersProductsOptions()
//    {
//        return $this->hasMany(OrdersProductsOptions::className(), ['orders_products_id' => 'product_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturers::className(), ['manufacturers_id' => 'manufacturer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxClass()
    {
        return $this->hasOne(TaxClass::className(), ['tax_class_id' => 'tax_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeightClass()
    {
        return $this->hasOne(WeightClass::className(), ['weight_class_id' => 'weight_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLengthClass()
    {
        return $this->hasOne(LengthClass::className(), ['length_class_id' => 'length_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasMany(ProductAttribute::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDiscounts()
    {
        return $this->hasMany(ProductDiscount::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductRelateds()
    {
        return $this->hasMany(ProductRelated::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductRelateds0()
    {
        return $this->hasMany(ProductRelated::className(), ['related_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelateds()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'related_id'])->viaTable('{{%product_related}}', ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'product_id'])->viaTable('{{%product_related}}', ['related_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductToCategories()
    {
        return $this->hasMany(ProductToCategory::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['category_id' => 'category_id'])->viaTable('{{%product_to_category}}', ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getReturns()
//    {
//        return $this->hasMany(Returns::className(), ['product_id' => 'product_id']);
//    }
}
