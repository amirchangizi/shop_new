<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 12/4/2017
 * Time: 10:55 AM
 */

namespace common\modules\catalog\actions;

use common\helpers\ProductHelper;
use Yii ;
use yii\base\Action ;
use yii\web\NotFoundHttpException;

class CompareAction extends Action
{


    public function run()
    {
        $cookies = Yii::$app->request->cookies;
        $cookieInfo = [] ;
        if (isset($cookies['compare'])){
            $cookieInfo = json_decode($cookies['compare']->value , true) ;
        }

        if(count($cookieInfo) <= 0 )
            throw new NotFoundHttpException(Yii::t('app' ,'There is no product for comparison'));

        foreach ($cookieInfo as $id)
        {
            $compare[$id] = ProductHelper::getProductById($id) ;
        }

        return $this->controller->render('compare' ,compact('compare'));
    }
}