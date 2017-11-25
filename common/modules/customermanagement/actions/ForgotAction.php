<?php
/**
 * User: amir changizi
 * Date: 10/14/2017
 * Time: 12:02 AM
 */

namespace common\modules\customermanagement\actions;


use Yii ;
use yii\base\Action ;
use common\modules\customermanagement\models\ForgotForm;

class ForgotAction extends Action
{

    const EVENT_FORGOT_PASSWORD = 'forgotPassword' ;

    public function run()
    {
        $model  = new ForgotForm() ;

        if($model->load(Yii::$app->request->post()) && $model->validate() )
        {
            return $this->controller->render('send_email_confirm');
        }

        return $this->controller->redirect(Yii::$app->request->referrer);

    }

}