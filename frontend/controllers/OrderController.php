<?php
namespace frontend\controllers;


use common\helpers\ZoneHelper;
use frontend\commons\BaseController;
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
class OrderController extends BaseController
{

    public function actions()
    {
        return [
            'add' => [
                'class' => 'common\modules\ordermanagement\actions\InsertBasketAction',
            ],
            'cart' => [
                'class' => 'common\modules\ordermanagement\actions\CartAction',
            ],
            'checkout' => [
                'class' => 'common\modules\ordermanagement\actions\CheckoutAction',
            ],
            'shipping' => [
                'class' => 'common\modules\ordermanagement\actions\ShippingAction',
            ],
            'payment' => [
                'class' => 'common\modules\ordermanagement\actions\PaymentAction',
            ],
            'factor' => [
                'class' => 'common\modules\ordermanagement\actions\FactorAction',
            ],
            'remove' => [
                'class' => 'common\modules\ordermanagement\actions\RemoveAction',
            ],

        ];
    }

    public function actionZone()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id') ;
        $zones = ZoneHelper::getZoneByCountry($id);

        if(!$zones)
            return [] ;

        return $zones;
    }


}
