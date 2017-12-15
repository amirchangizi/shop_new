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

class ShippingAction extends Action
{


    public function run()
    {


        $shippingMethod = ArrayHelper::map(Setting::find()->where(['code'=>'shipping' ,'language_id'=>Yii::$app->language])->all() ,'method' ,'method')  ;

        if(!$shippingMethod)
            throw new NotFoundHttpException('There is no shipping method.') ;

        if($delivery = Yii::$app->request->post('delivery'))
        {
            $cookies = Yii::$app->request->cookies;
            if (isset($cookies['shipping'])){
                $shippingInfo = $cookies['shipping']->value  ;
                return $this->controller->redirect(['order/payment']) ;
            }

            $cookie = new \yii\web\Cookie([
                'name' => 'shipping',
                'value' => $delivery ,
            ]) ;

            Yii::$app->getResponse()->getCookies()->add($cookie);

            return $this->controller->redirect(['order/payment']) ;

        }

        return $this->controller->render('shipping',compact('shippingMethod'));

    }
}



