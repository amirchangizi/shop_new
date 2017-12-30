<?php
/**
 * Created by PhpStorm.
 * User: changizi
 * Date: 12/3/2017
 * Time: 12:55 AM
 */

namespace common\modules\ordermanagement\actions;


use app\helper\productOrderFacade;
use common\modules\ordermanagement\models\Orders;
use common\modules\ordermanagement\models\OrdersProducts;
use Yii ;
use yii\base\Action ;

use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class FactorAction extends Action
{


    public function run()
    {

        $payment = $shipping = 0 ;
        $cookies = Yii::$app->request->cookies;

        if(isset($cookies['payment']))
            $payment = $cookies['payment']->value ;

        if(isset($cookies['shipping']))
            $shipping = $cookies['shipping']->value ;

        if(isset($cookies['address']))
            $address = $cookies['address']->value ;

        $order = new productOrderFacade();
        $products = $order->getBasket() ;

        $orders = new Orders() ;
        $orders->attributes = [
            'customer_id'=> 4 ,//Yii::$app->user->id ,
            'address_id' => $address ,
            'ip' => Yii::$app->request->userIP,
            'payment_method' => $payment ,
            'Shipping' => $shipping ,
            'new' => true ,
            'date_added' => time() ,
        ] ;


       if($orders->save())
       {
            foreach ($products as $product)
            {
                $productModel = new OrdersProducts() ;
                $tax = isset($product['tax']) ? $product['tax'] : 0 ;
                $productModel->attributes = [
                    'order_id' => $orders->orders_id ,
                    'product_id' => $product['productId'] ,
                    'products_model' => $product['productModel'],
                    'products_name' => $product['productName'],
                    'products_price'=> $product['productPrice'] ,
                    'final_price' => $product['productPrice'] - $product['productDiscount'] ,
                    'products_tax' => $tax ,
                    'product_quantity' => $product['count'] ,
                    'cost' => $product['productPrice'] - $product['productDiscount'] + $tax
                ] ;
                $productModel->save() ;
            }

       }

        return $this->controller->render('factor' ,compact('products' ,'payment' ,'shipping' ,'address'));

    }
}



