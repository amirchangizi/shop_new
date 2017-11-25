<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 10/14/2017
 * Time: 12:42 AM
 */

namespace app\modules\usermanagement\actions;

use app\modules\usermanagement\models\User;
use Yii ;
use yii\base\Action ;

class RegistrationAction extends Action
{


    public function run()
    {

        $model  = new  User(['scenario' => User::SCENARIO_REGISTER]);
        if($model->load($post = Yii::$app->request->post()) && $model->save() )
        {
            $message = Yii::t('app','Thank you for register.');

            return $this->controller->renderPartial('login', compact('message'));

        }
        else
        {
            return $this->goBack();
        }

    }

}