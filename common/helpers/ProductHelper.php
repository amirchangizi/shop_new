<?php
/**
 * User: amir changizi
 * Date: 11/13/2017
 * Time: 5:05 PM
 */

namespace common\helpers;

use common\modules\catalog\models\Product;
use common\modules\catalog\models\ProductAttribute;
use common\modules\catalog\models\ProductRelated;
use common\modules\catalog\models\ProductToCategory;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class ProductHelper extends Component
{

    public static function getProductByValue($id = null)
    {
        if(is_null($id))
            return ArrayHelper::map(Product::find()->where(['status'=>true ,'language_id'=> Yii::$app->language])->all() ,'product_id' ,'name') ;

        return ArrayHelper::map(Product::find()->where(['status'=>true ,'language_id'=> Yii::$app->language ])->andWhere(['NOT IN','product_id',[$id]])->all() ,'product_id' ,'name') ;
    }

    public static function getProductById($productId)
    {
        return Product::find()->where(['status'=>true ,'product_id' =>$productId ,'language_id'=> Yii::$app->language])->one()  ;
    }

    public static function getProductByCategory($categoryId ,$limit = 4, $sort = null)
    {
        $categoryIds  = ArrayHelper::map(ProductToCategory::find()->where(['category_id'=>$categoryId])->all() ,'product_id' ,'product_id') ;

        return Product::find()->where(['status'=>true,'language_id'=> Yii::$app->language])->andWhere(['IN','product_id',$categoryIds])->limit($limit)->orderBy(['product_id'=>SORT_DESC])->all() ;
    }

    public static function getProductRelated($productId ,$limit = 4)
    {
        $relatedIds = ArrayHelper::map(ProductRelated::find()->where(['product_id'=>$productId])->all() ,'related_id' ,'related_id') ;
        return Product::find()->where(['status'=>true,'language_id'=> Yii::$app->language])->andWhere(['IN','product_id',$relatedIds])->limit($limit)->orderBy(['product_id'=>SORT_DESC])->all()  ;
    }

    public static function getMultiProductRelated(array $productIds ,$limit = 2)
    {
        $relatedIds = ArrayHelper::map(ProductRelated::find()->where(['IN','product_id',$productIds] )->all() ,'related_id' ,'related_id') ;
        return Product::find()->where(['status'=>true,'language_id'=> Yii::$app->language])->andWhere(['IN','product_id',$relatedIds])->limit($limit)->orderBy(['product_id'=>SORT_DESC])->all()  ;
    }

    public static function getProductAttribute($productId)
    {
        return ArrayHelper::map(ProductAttribute::find()->where(['product_id'=>$productId])->all() ,'attribute_name' ,'attribute_desc') ;
    }

    public static function getSpecialProduct($limit = 4)
    {
        return Product::find()->where(['status'=>true ,'Special'=>true ,'language_id'=> Yii::$app->language])->limit($limit)->all() ;
    }

    public static function getNewestProduct($limit = 4)
    {
        return Product::find()->where(['status'=>true ,'language_id'=> Yii::$app->language])->limit($limit)->orderBy(['product_id'=>SORT_DESC])->all() ;
    }

    public static function getProductByBrands($ids ,$limit = 12)
    {
        return Product::find()->where(['in','manufacturer_id',$ids])->limit($limit)->all() ;
    }

    public static function getBestSellerProduct()
    {

    }

    public static function getProductView($productId)
    {

    }

    public static function SumOfProductDiscount($productId)
    {

    }

}