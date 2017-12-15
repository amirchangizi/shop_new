<?php
/**
 * Created by PhpStorm.
 * User: changizi
 * Date: 12/3/2017
 * Time: 12:55 AM
 */

namespace common\modules\ordermanagement\actions;


use app\helper\productOrderFacade;
use Yii ;
use yii\base\Action ;

use yii\web\NotFoundHttpException;

class RemoveAction extends Action
{



    public function run()
    {
        if(!is_null($id = Yii::$app->request->get('id')))
        {
            $order = new productOrderFacade();
            $order->removeProductFromCart($id) ;
        }

        return $this->controller->redirect(Yii::$app->request->referrer);

    }
}



