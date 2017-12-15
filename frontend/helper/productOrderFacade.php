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

    public function __construct($pID = null) {

        if(!is_null($pID))
        {
            $this->productId = $pID;

            $this->productModel = ProductHelper::getProductById($this->productId) ;

            if(!$this->productModel)
                throw new NotFoundHttpException(Yii::t('app','This product not exsist .')) ;
        }
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

    public function getBasket()
    {
        $cookies = Yii::$app->request->cookies;

        if (isset($cookies['basket']))
            return json_decode($cookies['basket']->value , true) ;

        return false ;
    }

    public function sumOfOrder()
    {
        $cookies = Yii::$app->request->cookies;

        if (isset($cookies['basket'])){
            $cookieInfo = json_decode($cookies['basket']->value , true) ;

            $sum = 0 ;
            foreach ($cookieInfo as $key => $value)
            {
                $sum = $sum + $value['productPrice'];
            }

            return $sum ;
        }
        return 0 ;
    }

    private function addToCart($countOfProduct)
    {
        $cookies = Yii::$app->request->cookies;
        $cookieInfo = [] ;
        if (isset($cookies['basket'])){
            $cookieInfo = json_decode($cookies['basket']->value , true) ;
        }

        if(isset($cookieInfo[$this->productId]))
        {

            $cookieInfo[$this->productId]['count'] = $cookieInfo[$this->productId]['count'] + 1 ;
            $cookieInfo[$this->productId]['sum'] = $cookieInfo[$this->productId]['count'] * $cookieInfo[$this->productId]['productPrice'] ;

            $cookie = new \yii\web\Cookie([
                'name' => 'basket',
                'value' => json_encode($cookieInfo),
            ]) ;

            Yii::$app->getResponse()->getCookies()->add($cookie);

        }


        if(is_array($cookieInfo) && count($cookieInfo) > 0 )
        {
            $cookieInfo[$this->productId] = [
                'productId' => $this->productId,
                'productName' => $this->productModel->name,
                'productPrice' => $this->productModel->price,
                'productImage' => $this->productModel->image,
                'productCount' => $countOfProduct,
                'productModel' => $this->productModel->model ,
                'productDiscount' => $this->applyDiscount()  ,
                'count' => 1 ,
                'sum' => $this->productModel->price
            ] ;

            $cookie = new \yii\web\Cookie([
                'name' => 'basket',
                'value' => json_encode($cookieInfo),
            ]) ;

            Yii::$app->getResponse()->getCookies()->add($cookie);
        }
        else
        {
            $product[$this->productId] = [
                'productId' => $this->productId,
                'productName' => $this->productModel->name,
                'productPrice' => $this->productModel->price,
                'productImage' => $this->productModel->image,
                'productCount' => $countOfProduct,
                'productModel' => $this->productModel->model ,
                'productDiscount' => $this->applyDiscount()  ,
                'count' => 1 ,
                'sum' => $this->productModel->price
            ] ;

            $cookie = new \yii\web\Cookie([
                'name' => 'basket',
                'value' => json_encode($product),
            ]) ;


            Yii::$app->getResponse()->getCookies()->add($cookie);

        }

    }

    public function removeProductFromCart($productId)
    {
        $cookies = Yii::$app->request->cookies;
        if (isset($cookies['basket']))
        {
            $cookieInfo = json_decode($cookies['basket']->value , true) ;

            if(isset($cookieInfo[$productId]))
            {
                unset($cookieInfo[$productId]) ;
            }

            $cookie = new \yii\web\Cookie([
                'name' => 'basket',
                'value' => json_encode($cookieInfo),
            ]) ;

            Yii::$app->getResponse()->getCookies()->add($cookie);
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