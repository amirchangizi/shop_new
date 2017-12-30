<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 10/14/2017
 * Time: 12:42 AM
 */

namespace common\modules\customermanagement\actions;

use common\modules\customermanagement\models\Customers;
use Yii ;
use yii\base\Action ;

class RegistrationAction extends Action
{


    public function run()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->controller->goHome();
        }

        $model = new Customers(['scenario' => Customers::SCENARIO_REGISTER]) ;

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            return $this->controller->redirect(['site/index']) ;
        }

        return $this->controller->render('register', [
            'model' => $model,

        ]);

    }

}