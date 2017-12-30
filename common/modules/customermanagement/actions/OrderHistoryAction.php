<?php
/**
 * User: amir changizi
 * Date: 10/14/2017
 * Time: 12:02 AM
 */

namespace common\modules\customermanagement\actions;


use Yii ;
use yii\base\Action ;


class OrderHistoryAction extends Action
{



    public function run()
    {


        return $this->controller->redirect(Yii::$app->request->referrer);

    }

}