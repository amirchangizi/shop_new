<?php
namespace frontend\controllers;


use frontend\commons\BaseController;
use Yii;
use yii\helpers\Html;


/**
 * Site controller
 */
class ProductController extends BaseController
{

    public function actions()
    {
        return [
            'category' => [
                'class' => 'common\modules\catalog\Actions\CategoryAction',
            ],
            'brands' => [
                'class' => 'common\modules\catalog\Actions\BrandsAction',
            ],
            'view' => [
                'class' => 'common\modules\catalog\Actions\ProductViewAction',
            ],
            'compare' => [
                'class' => 'common\modules\catalog\Actions\CompareAction',
            ],
        ]   ;
    }

    public function actionIndex()
    {
        echo Html::a('test' ,['category' ,'categoryId'=> 4]);
    }

    public function actionAddcompare($productId)
    {
        $cookies = Yii::$app->request->cookies;
        $cookieInfo = [] ;
        if (isset($cookies['compare'])){
            $cookieInfo = json_decode($cookies['compare']->value , true) ;
        }


        if( is_array($cookieInfo) &&  !isset($cookieInfo[$productId]))
        {
            $cookieInfo[$productId] = $productId ;
        }

        $cookie = new \yii\web\Cookie([
            'name' => 'compare',
            'value' => json_encode($cookieInfo),
        ]) ;

        Yii::$app->getResponse()->getCookies()->add($cookie);

        return $this->redirect(Yii::$app->request->referrer);
    }

}
