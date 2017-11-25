<?php
namespace common\modules\customermanagement\models;

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
        if(!Customers::find()->where(['is_block'=>0,'customer_email'=>$this->email])->one())
            $this->addError('Email',Yii::t('app','This email not exist.')) ;

    }

    public static function sendEmail($event)
    {
        //send email code
    }

}
