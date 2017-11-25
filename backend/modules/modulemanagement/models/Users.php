<?php

namespace app\modules\modulemanagement\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $user_id
 * @property string $parent_id
 * @property string $name
 * @property string $user_name
 * @property string $password
 * @property string $password_reset_token
 * @property string $user_image
 * @property string $email
 * @property integer $block
 * @property integer $age
 * @property string $joined_time
 * @property string $about_me
 *
 * @property LoginTimes[] $loginTimes
 * @property Modules[] $modules
 * @property Modules[] $modules0
 * @property UsergroupMap[] $usergroupMaps
 * @property Users $parent
 * @property Users[] $users
 * @property Widgets[] $widgets
 * @property Widgets[] $widgets0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'block', 'age', 'joined_time'], 'integer'],
            [['name', 'email'], 'string', 'max' => 100],
            [['user_name', 'password', 'password_reset_token', 'user_image', 'about_me'], 'string', 'max' => 255],
            [['name', 'user_name', 'password'], 'unique', 'targetAttribute' => ['name', 'user_name', 'password'], 'message' => 'The combination of Name, User Name and Password has already been taken.'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['parent_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'name' => Yii::t('app', 'Name'),
            'user_name' => Yii::t('app', 'User Name'),
            'password' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'user_image' => Yii::t('app', 'User Image'),
            'email' => Yii::t('app', 'Email'),
            'block' => Yii::t('app', 'Block'),
            'age' => Yii::t('app', 'Age'),
            'joined_time' => Yii::t('app', 'Joined Time'),
            'about_me' => Yii::t('app', 'About Me'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginTimes()
    {
        return $this->hasMany(LoginTimes::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModules()
    {
        return $this->hasMany(Modules::className(), ['added_user' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModules0()
    {
        return $this->hasMany(Modules::className(), ['modified_user' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsergroupMaps()
    {
        return $this->hasMany(UsergroupMap::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['parent_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgets()
    {
        return $this->hasMany(Widgets::className(), ['user_added' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgets0()
    {
        return $this->hasMany(Widgets::className(), ['modified_user' => 'user_id']);
    }
}
