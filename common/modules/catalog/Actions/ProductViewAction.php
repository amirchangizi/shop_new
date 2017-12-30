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

class ProductViewAction extends Action
{

    public function run()
    {

        if(!$id = Yii::$app->request->get('id'))
            throw new NotFoundHttpException(Yii::t('app','This product was found .')) ;


        $model = ProductHelper::getProductById($id);

        if(!$model)
            throw new NotFoundHttpException(Yii::t('app','This product was found .')) ;

        return $this->controller->render('view' ,['model'=>$model  ,'id'=>$id]);

    }
}



