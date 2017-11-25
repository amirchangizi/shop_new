<?php
namespace app\modules\usermanagement\models;

use app\modules\usermanagement\UsermanagementModule;
use Yii;
use yii\base\Model;


class ForgotForm extends Model
{

    const EVENT_AFTER_VALIDATE = 'afterValidate';

    public $email;

    public function init()
    {

        parent::init();
        $this->on(self::EVENT_AFTER_VALIDATE,  [$this,'sendEmail']);

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'email'],
            ['email', 'existEmail'],
        ];
    }

    public function existEmail()
    {
        if(!User::find()->where(['block'=>0,'email'=>$this->email])->one())
            $this->addError('Email',UsermanagementModule::t('back','This email not exist.')) ;

    }

    public static function sendEmail($event)
    {
        //send email code
    }

}
