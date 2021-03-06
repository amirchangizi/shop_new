<?php

namespace common\modules\customermanagement\models;

use common\modules\customermanagement\models\Customers ;
use Yii;
use yii\base\Model;

//use frontend\models\Customers ;


/**
 * Login form
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],

            //[['username', 'password'], 'match', 'pattern' => '/^[A-Za-z0-9_~\-@\\^\(\)]+$/'],

            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            //['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {

        if ($this->validate()) {
            if(is_null($this->getUser()))
                return false;
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return Customers|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Customers::find()->where(['customer_username' => $this->username ,'is_block'=>0 ])->one();

        }

        return $this->_user;
    }
}
