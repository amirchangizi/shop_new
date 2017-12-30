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

class CategoryAction extends Action
{
    public $categoryId ;

    public function run()
    {

        if(!$this->categoryId = Yii::$app->request->get('categoryId'))
            throw new NotFoundHttpException(Yii::t('app' ,'No product was found in this category')) ;

        $limit = 12 ;
        if(Yii::$app->request->get('limit'))
            $limit = Yii::$app->request->get('limit') ;

        $sort = null;

        $model = ProductHelper::getProductByCategory($this->categoryId ,$limit ,$sort);

        if(!$model)
            throw new NotFoundHttpException(Yii::t('app' ,'No product was found in this category')) ;

        return $this->controller->render('category' ,['model'=>$model , 'categoryId'=>$this->categoryId]);

    }
}



