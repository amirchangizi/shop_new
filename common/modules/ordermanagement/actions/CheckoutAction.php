<?php
/**
 * Created by PhpStorm.
 * User: changizi
 * Date: 12/3/2017
 * Time: 12:55 AM
 */

namespace common\modules\ordermanagement\actions;

use common\helpers\ProductHelper;


use common\modules\ordermanagement\models\OrderAddress;
use Yii ;
use yii\base\Action ;

use yii\web\NotFoundHttpException;

class CheckoutAction extends Action
{


    public function run()
    {

        $model = new OrderAddress() ;

        if($model->load($post = Yii::$app->request->post()) && $model->validate() )
        {
            $cookies = Yii::$app->request->cookies;
            $model->save() ;
            if (isset($cookies['address'])){
                $addressInfo = $cookies['address']->value  ;
                return 'has address' ;
            }

            $cookie = new \yii\web\Cookie([
                'name' => 'address',
                'value' => $model->order_address_id ,
            ]) ;

            Yii::$app->getResponse()->getCookies()->add($cookie);

            return $this->controller->redirect(['order/shipping']) ;

        }

        return $this->controller->render('checkout',compact('model'));

    }
}



