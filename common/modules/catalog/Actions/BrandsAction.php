<?php
/**
 * Created by PhpStorm.
 * User: changizi
 * Date: 12/3/2017
 * Time: 12:55 AM
 */

namespace common\modules\catalog\actions;

use common\helpers\ProductHelper;

use Yii ;
use yii\base\Action ;

use yii\web\NotFoundHttpException;

class BrandsAction extends Action
{



    public function run()
    {
        if($brands = Yii::$app->request->post('brands'))
        {
            $model = ProductHelper::getProductByBrands($brands) ;

            if(!$model)
                throw new NotFoundHttpException('No product was found in this category') ;

            return $this->controller->render('brands' ,compact('model'));
        }

    }
}



