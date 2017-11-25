<?php

namespace app\modules\usermanagement\models;

use Yii;

/**
 * This is the model class for table "{{%usergroup_map}}".
 *
 * @property string $user_id
 * @property string $group_id
 *
 * @property User $user
 * @property Usergroups $group
 */
class UsergroupMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usergroup_map}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id'], 'required'],
            [['user_id', 'group_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usergroups::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'group_id' => Yii::t('app', 'Group ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Usergroups::className(), ['id' => 'group_id']);
    }
}
