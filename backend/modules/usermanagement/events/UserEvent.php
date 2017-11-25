<?php
/**
 * User: amir changizi
 * Date: 10/13/2017
 * Time: 12:59 PM
 */
namespace app\modules\usermanagement\events;

use Yii ;
use yii\base\Component;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use app\modules\usermanagement\UsermanagementModule;

class UserEvent extends Component
{

    public static function afterLogin($event)
    {

    }

    public static function beforeLogin($event)
    {

        $attempts_status = UsermanagementModule::checkAttempts() ;

        if(!$attempts_status)
            throw new HttpException('warning',UsermanagementModule::t('back','You tried too much for login.'));

    }

}