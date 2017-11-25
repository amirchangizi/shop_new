<?php
/**
 * User: amir changizi
 * Date: 10/16/2017
 * Time: 1:04 PM
 */

namespace app\modules\usermanagement\models;

use Yii;
use yii\base\Model;

class ConfigForm extends Model
{
    public $maxAttempts ,$useEmailAsLogin ,$useSocialAsLogin ,$sendEmailAfterRegister ;

    public $enableRegistration ,$confirmationTokenExpire ,$imagesFolder ,$attemptsTimeout;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['maxAttempts','useSocialAsLogin','sendEmailAfterRegister','enableRegistration'], 'integer'],
            [['confirmationTokenExpire','attemptsTimeout'], 'integer'],
            [['imagesFolder'], 'string', 'max' => 150],
            //[['imagesFolder' ], 'match', 'pattern' => '/^[A-Za-z0-9_~\-\\^\(\)]+$'] ,
            [['enableRegistration','useSocialAsLogin','sendEmailAfterRegister','enableRegistration'], 'in', 'range' => [0, 1]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'maxAttempts' => Yii::t('app', 'Max attempts'),
            'enableRegistration' => Yii::t('app', 'Enable registration'),
            'useSocialAsLogin' => Yii::t('app', 'Use social as login'),
            'sendEmailAfterRegister' => Yii::t('app', 'Send email after register'),
            'confirmationTokenExpire' => Yii::t('app', 'Confirmation token expire'),
            'attemptsTimeout' => Yii::t('app', 'Attempts timeout'),
            'imagesFolder' => Yii::t('app', 'Images folder'),
        ];
    }

}