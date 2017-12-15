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

class InsertBasketAction extends Action
{



    public function run()
    {
        if($productId = Yii::$app->request->get('id'))
        {
            $order = new productOrderFacade($productId);
            $order->generateOrder($productId);
            return $this->controller->redirect(Yii::$app->request->referrer);

        }


    }
}



