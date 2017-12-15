<?php
namespace frontend\controllers;


use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class ProductController extends Controller
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
