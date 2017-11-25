<?php


namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class SettingsForm extends Model
{
    public $title, $meteDesc,$metaKey;
    public $shopName ,$ownerName ,$address ,$email ,$phone ,$fax ,$workTime ,$description;
    public $registerComment ,$gusetComment ,$priceWithTax ,$defaultCustomerGroup ,$accountTerms ,$factorPrefix ,$paidTerms ,$orderStatus ,$showStockDepot;
    public $returnCondition ,$returnStatus ,$logo ,$emailPorotocol ,$emailParameter ,$hostName ,$userName ,$password ,$port ,$smtpInterrupt;
    public $shopClose ;

    public function rules()
    {
        return [
            [['title', 'meteDesc', 'metaKey', 'shopName','ownerName','address','email','phone','returnStatus','orderStatus'], 'required'],
            [['phone', 'registerComment', 'gusetComment', 'priceWithTax', 'defaultCustomerGroup', 'accountTerms','paidTerms','orderStatus','showStockDepot','returnCondition','returnStatus','fax','shopClose'], 'integer'],
            [['title', 'shopName', 'ownerName','email','factorPrefix','hostName','userName','password','port','smtpInterrupt'], 'string', 'max' => 100],
            [['meteDesc', 'address','workTime','description','logo','emailPorotocol','emailParameter'], 'string', 'max' => 250],

        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => Yii::t('app', 'Title'),
            'meteDesc' => Yii::t('app', 'mete description'),
            'metaKey' => Yii::t('app', 'mete key'),
            'description' => Yii::t('app', 'description'),
            'shopName' => Yii::t('app', 'shop name'),
            'ownerName' => Yii::t('app', 'owner name'),
            'address' => Yii::t('app', 'address'),
            'email' => Yii::t('app', 'email'),
            'phone' => Yii::t('app', 'phone'),
            'returnCondition' => Yii::t('app', 'Return Condition'),
            'logo' => Yii::t('app', 'logo'),
            'registerComment' => Yii::t('app', 'register comment'),
            'gusetComment' => Yii::t('app', 'guset comment'),
            'priceWithTax' => Yii::t('app', 'show price with tax'),
            'defaultCustomerGroup' => Yii::t('app', 'default gustomer group'),
            'accountTerms' => Yii::t('app', 'account terms'),
            'paidTerms' => Yii::t('app', 'paid terms'),
            'orderStatus' => Yii::t('app', 'order status'),
            'showStockDepot' => Yii::t('app', 'show stock depot'),
            'returnConditio' => Yii::t('app', 'return conditio'),
            'returnStatus' => Yii::t('app', 'return status'),
            'fax' => Yii::t('app', 'fax'),
            'factorPrefix' => Yii::t('app', 'factor prefix'),
            'hostName' => Yii::t('app', 'host name'),
            'userName' => Yii::t('app', 'user name'),
            'password' => Yii::t('app', 'password'),
            'port' => Yii::t('app', 'port'),
            'smtpInterrupt' => Yii::t('app', 'smtpInterrupt'),
            'workTime' => Yii::t('app', 'work time'),
            'emailPorotocol' => Yii::t('app', 'email porotocol'),
            'emailParameter' => Yii::t('app', 'email parameter'),
            'shopClose' => Yii::t('app', 'shop close'),
        ];
    }

}