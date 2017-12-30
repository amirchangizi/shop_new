<?php

namespace common\modules\customermanagement\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%customers}}".
 *
 * @property string $customer_id
 * @property string $customer_group_id
 * @property string $customer_name
 * @property string $customer_username
 * @property string $customer_password
 * @property string $access_token
 * @property string $customer_image
 * @property string $customer_email
 * @property string $phone
 * @property string $mobile
 * @property integer $is_block
 * @property string $user_id
 * @property string $customer_parent_id
 * @property integer $create_time
 * @property integer $update_time
 * @property string $customer_max_credit
 * @property integer $is_agency
 *
 * @property Coupon[] $coupons
 * @property CouponHistory[] $couponHistories
 * @property CustomerGroup $customerGroup
 * @property CustomersBasket[] $customersBaskets
 * @property OrderAddress[] $orderAddresses
 * @property Orders[] $orders
 * @property Returns[] $returns
 */
class Customers extends ActiveRecord implements IdentityInterface
{
    const STATUS_DEACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const SCENARIO_REGISTER = 'signup';

    const SCENARIO_EDITPROFILE = 'editprofile';

    const SCENARIO_ADMINEDITPROFILE = 'admineditprofile';

    const SCENARIO_SETPASSWORD = 'setpassword';

    public $imageFile ,$repeat_password ;

    public function scenarios()
    {
        return [
            'default' => ['customer_name', 'customer_username', 'customer_password'  ,'customer_email','is_block'],
            self::SCENARIO_REGISTER => ['customer_name', 'customer_username', 'customer_password' ,'repeat_password' ,'customer_email', 'mobile' ],
            self::SCENARIO_EDITPROFILE => ['customer_group_id', 'customer_name', 'customer_username', 'customer_password' ,'access_token' ,'customer_image' ,'customer_email' ,'phone' ,'mobile' ,'is_block', 'customer_parent_id','customer_max_credit' ,'is_agency' ,'user_id' ,'create_time' ,'update_time'],
            self::SCENARIO_ADMINEDITPROFILE => ['customer_group_id', 'customer_name', 'customer_username', 'customer_password' ,'access_token' ,'customer_image' ,'customer_email' ,'phone' ,'mobile' ,'is_block', 'customer_parent_id','customer_max_credit' ,'is_agency' ,'user_id' ,'create_time' ,'update_time'],
            self::SCENARIO_SETPASSWORD => ['customer_group_id', 'customer_name', 'customer_username', 'customer_password' ,'access_token' ,'customer_image' ,'customer_email' ,'phone' ,'mobile' ,'is_block', 'customer_parent_id','customer_max_credit' ,'is_agency' ,'user_id' ,'create_time' ,'update_time'] ,

        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
                'value' => time(),
            ],

        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Yii::$app->getModule('customermanagement')->customer_table;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_group_id', 'is_block', 'user_id', 'customer_parent_id', 'create_time', 'update_time', 'customer_max_credit', 'is_agency'], 'integer'],

            [['customer_name', 'customer_username', 'customer_password', 'customer_email','repeat_password','mobile'], 'required', 'on' => self::SCENARIO_REGISTER],
            [['customer_name', 'customer_username', 'customer_password', 'customer_email','repeat_password','phone','customer_group_id'], 'required', 'on' => self::SCENARIO_EDITPROFILE],
            [['customer_name', 'customer_username', 'customer_password', 'customer_email','repeat_password','phone','customer_group_id'], 'required', 'on' => self::SCENARIO_ADMINEDITPROFILE],
            [['customer_password','repeat_password'], 'required', 'on' => self::SCENARIO_SETPASSWORD],

            [['customer_name','customer_password', 'repeat_password','customer_username'], 'match', 'pattern' => '/^[A-Za-z0-9_~\-@\\^\(\)]+$/'] ,

            [['customer_name', 'customer_username', 'customer_email'], 'string', 'max' => 50],
            [['customer_password','repeat_password'], 'string', 'max' => 255],
            [['access_token','imageFile'], 'string', 'max' => 200],
            [['customer_image'], 'string', 'max' => 250],
            [['phone', 'mobile'], 'string', 'max' => 15],

            ['customer_email', 'email'],
            ['repeat_password', 'compare', 'compareAttribute' => 'customer_password' , 'message' => 'Password confirm don\'t match'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],

            [['customer_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerGroup::className(), 'targetAttribute' => ['customer_group_id' => 'customer_group_id']],
        ];
    }

    public function beforeSave($insert)
    {
        $this->upload() ;
        if($this->isNewRecord)
            $this->setPassword() ;

        if(!$this->isNewRecord && !empty($this->customer_password))
            $this->setPassword() ;

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function upload()
    {
        if (!$this->isNewRecord && !$this->imageFile) {
            $this->imageFile = $this->oldAttributes['customer_image'];
            return $this->imageFile;
        }
        if ($this->isNewRecord && $this->imageFile) {
            $path = Yii::getAlias(Yii::$app->getModule('usermanagement')->imagesFolder);

            $this->imageFile->saveAs($path . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->user_image = Url::to(['/web/images/users/']).'/'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => Yii::t('app', 'Customer ID'),
            'customer_group_id' => Yii::t('app', 'Customer Group'),
            'customer_name' => Yii::t('app', 'Customer Name'),
            'customer_username' => Yii::t('app', 'Customer Username'),
            'customer_password' => Yii::t('app', 'Customer Password'),
            'repeat_password' => Yii::t('app', 'Password repeat'),
            'access_token' => Yii::t('app', 'Access Token'),
            'customer_image' => Yii::t('app', 'Customer Image'),
            'customer_email' => Yii::t('app', 'Customer Email'),
            'phone' => Yii::t('app', 'Phone'),
            'mobile' => Yii::t('app', 'Mobile'),
            'is_block' => Yii::t('app', 'Block'),
            'user_id' => Yii::t('app', 'User ID'),
            'customer_parent_id' => Yii::t('app', 'Customer Parent'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'customer_max_credit' => Yii::t('app', 'Customer Max Credit'),
            'is_agency' => Yii::t('app', 'Is Agency'),
        ];
    }

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getCoupons()
//    {
//        return $this->hasMany(Coupon::className(), ['customer_id' => 'customer_id']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getCouponHistories()
//    {
//        return $this->hasMany(CouponHistory::className(), ['customer_id' => 'customer_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerGroup()
    {
        return $this->hasOne(CustomerGroup::className(), ['customer_group_id' => 'customer_group_id']);
    }

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getCustomersBaskets()
//    {
//        return $this->hasMany(CustomersBasket::className(), ['customers_id' => 'customer_id']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getOrderAddresses()
//    {
//        return $this->hasMany(OrderAddress::className(), ['customer_id' => 'customer_id']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getOrders()
//    {
//        return $this->hasMany(Orders::className(), ['customer_id' => 'customer_id']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getReturns()
//    {
//        return $this->hasMany(Returns::className(), ['customer_id' => 'customer_id']);
//    }


    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne(['customer_id' => $id, 'is_block' => 0]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->customer_password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword()
    {
        $this->customer_password = Yii::$app->security->generatePasswordHash($this->customer_password);
    }

}
