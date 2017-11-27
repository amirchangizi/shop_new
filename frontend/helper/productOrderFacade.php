<?php

/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 11/27/2017
 * Time: 11:02 PM
 */

namespace  app\helper ;

use common\helpers\ProductHelper;
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

    public function generateOrder()
    {

        if(!$this->qtyCheck())
            return false ;

        // Add Product to Cart
        $this->addToCart();

    }

    private function addToCart()
    {

    }

    private function qtyCheck() {

        if($this->productModel->quantity <= 0)
            return false;

        return true;



    }


    private function calulateShipping() {
        $shipping = new shippingCharge();
        $shipping->calculateCharge();
    }

    private function applyDiscount() {
        $discount = new discount();
        $discount->applyDiscount();
    }

    private function placeOrder() {
        $order = new order();
        $order->generateOrder();
    }

}