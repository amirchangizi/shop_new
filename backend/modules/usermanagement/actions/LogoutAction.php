<?php
/**
 * User: amir changizi
 * Date: 10/13/2017
 * Time: 12:10 PM
 */

namespace app\modules\usermanagement\actions;

use Yii ;
use yii\base\Action ;

class LogoutAction extends Action
{

    public function run()
    {
        Yii::$app->user->logout();

        return $this->controller->goHome();
    }

}