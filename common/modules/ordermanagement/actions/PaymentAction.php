<?php
/**
 * Created by PhpStorm.
 * User: changizi
 * Date: 12/3/2017
 * Time: 12:55 AM
 */

namespace common\modules\ordermanagement\actions;

use common\helpers\ProductHelper;

use common\modules\shopconfig\models\Setting;
use Yii ;
use yii\base\Action ;

use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class PaymentAction extends Action
{


    public function run()
    {
        $paymentMethod = ArrayHelper::map(Setting::find()->where(['code'=>'payment' ,'language_id'=>Yii::$app->language])->all() ,'method' ,'method')  ;

        if(!$paymentMethod)
            throw new NotFoundHttpException('There is no payment method.') ;

        if($payment = Yii::$app->request->post('payment'))
        {
            if(!isset($paymentMethod[$payment]))
                throw new NotFoundHttpException('There is no payment method.') ;

            $cookies = Yii::$app->request->cookies;

            if (isset($cookies['payment'])){
                $paymentInfo = $cookies['payment']->value  ;
                if($paymentInfo !== $payment)
                {
                    $cookie = new \yii\web\Cookie([
                        'name' => 'payment',
                        'value' => $payment ,
                    ]) ;

                    Yii::$app->getResponse()->getCookies()->add($cookie);
                }

                return $this->controller->redirect(['order/factor']) ;
            }

            $cookie = new \yii\web\Cookie([
                'name' => 'payment',
                'value' => $payment ,
            ]) ;

            Yii::$app->getResponse()->getCookies()->add($cookie);

            return $this->controller->redirect(['order/factor']) ;

        }

        return $this->controller->render('payment',compact('paymentMethod'));

    }
}



