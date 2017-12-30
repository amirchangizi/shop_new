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
        ]   ;
    }

    public function actionIndex()
    {
        echo Html::a('test' ,['category' ,'categoryId'=> 4]);
    }

}
