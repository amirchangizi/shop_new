<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 12/3/2017
 * Time: 12:14 AM
 */

namespace frontend\controllers;

use common\helpers\ProductHelper;
use Yii ;
use yii\web\Controller;

class ProductController extends Controller
{

    public function actionProduct($productId)
    {
        
    }

    public function actionCategory($categoryId)
    {
        $model = ProductHelper::getProductByCategory($categoryId);

        return $this->render('category' ,compact('model'));

        echo '<pre>';

        print_r($model);
        exit('ok');
    }
}