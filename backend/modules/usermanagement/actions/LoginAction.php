<?php
/**
 * User: amir changizi
 * Date: 10/13/2017
 * Time: 11:17 AM
 */

namespace app\modules\usermanagement\actions;


use Yii ;
use yii\base\Action ;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use app\modules\usermanagement\models\LoginForm;


class LoginAction extends Action
{

    const EVENT_AFTER_LOGIN = 'afterLogin' ;

    const EVENT_BEFORE_LOGIN = 'beforeLogin' ;

    public $active_partial = false ;

    public function init()
    {
        $this->on(self::EVENT_AFTER_LOGIN, ['app\modules\usermanagement\events\UserEvent', 'afterLogin']);
        $this->on(self::EVENT_BEFORE_LOGIN, ['app\modules\usermanagement\events\UserEvent', 'beforeLogin']);
        return parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {

        try
        {
            if (!Yii::$app->user->isGuest) {
                return $this->controller->goHome();
            }

            $this->trigger(self::EVENT_BEFORE_LOGIN);
            $model = new LoginForm();

            if ($model->load(Yii::$app->request->post()) && $model->login() ) {

                $this->trigger(self::EVENT_AFTER_LOGIN);

                return $this->controller->goBack();
            } else {
                if($this->active_partial)
                    return $this->controller->renderPartial('login', [
                        'model' => $model,
                    ]);

                return $this->controller->render('login', [
                    'model' => $model,
                ]);
            }
        }
        catch (\Exception $e)
        {
            throw new HttpException($e->getCode(),$e->getMessage()) ;
        }


    }



}