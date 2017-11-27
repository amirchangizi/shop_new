<?php

/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 11/27/2017
 * Time: 11:02 PM
 */

namespace  app\helper ;

use common\helpers\ProductHelper;
use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\base\Component ;
use yii\web\NotFoundHttpException;

class productOrderFacade extends Component
{

    public $productId ;

    private $productModel ;

    public function __construct($pID) {
        $this->productID = $pID;

        $this->productModel = ProductHelper::getProductById($this->productId) ;

        if(!$this->productModel)
            throw new NotFoundHttpException(Yii::t('app','This product not exsist .')) ;
    }

    /**
     * @param Integer $countOfProduct
     * @return bool|string
     */
    public function generateOrder($countOfProduct)
    {

        if(!$message = $this->qtyCheck())
            return $message ;

        // Add Product to Cart
        $this->addToCart($countOfProduct);

        return true ;

    }

    private function addToCart($countOfProduct)
    {
        $cookies = Yii::$app->request->cookies;
        $cookieInfo = [] ;
        if (isset($cookies['basket']))
            $cookieInfo = json_decode($cookies['basket']->value , true) ;

        $product = [
            'productId' => $this->productId,
            'productName' => $this->productModel->name,
            'productPrice' => $this->productModel->price,
            'productImage' => $this->productModel->image,
            'productCount' => $countOfProduct,
            'productModel' => $this->productModel->model ,
            'productDiscount' => $this->applyDiscount()  ,
        ] ;


        $product = array_merge($product,$cookieInfo) ;

        $cookies->add(new \yii\web\Cookie([
            'name' => 'basket',
            'value' => json_encode($product),
        ]));

    }

    public function removeProductFromCart()
    {
        $cookies = Yii::$app->request->cookies;
        $cookieInfo = [] ;

        if (isset($cookies['basket']))
        {
            $cookieInfo = json_decode($cookies['language']->value , true) ;

            $cookieInfo  = '';

        }
    }

    private function qtyCheck()
    {
        if($this->productModel->quantity <= 0)
            return Yii::t('app' ,'This '.$this->productModel->name.' not exist');

        return true;
    }


    public function applyDiscount() {

        $discount = new Discount();

        if($discountPrice = $discount->applyDiscount($this->productId))
            return $discountPrice;

        return 0 ;
    }


}