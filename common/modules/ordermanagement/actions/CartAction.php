<?php
/**
 * Created by PhpStorm.
 * User: changizi
 * Date: 12/3/2017
 * Time: 12:55 AM
 */

namespace common\modules\ordermanagement\actions;

use common\helpers\ProductHelper;

use app\helper\productOrderFacade;
use Yii ;
use yii\base\Action ;

use yii\web\NotFoundHttpException;

class CartAction extends Action
{



    public function run()
    {

        $order = new productOrderFacade();

        if(!$product = $order->getBasket())
            throw new NotFoundHttpException(Yii::t('app' ,'There are no products in the cart.'));


        return $this->controller->render('cart' ,compact('product'));

    }
}



