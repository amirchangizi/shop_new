<?php

namespace app\models;

use app\modules\modulemanagement\models\Users;
use Yii;

/**
 * This is the model class for table "{{%modules}}".
 *
 * @property string $module_id
 * @property string $title
 * @property string $module_name
 * @property string $module_path
 * @property string $note
 * @property integer $core
 * @property integer $client
 * @property string $config
 * @property string $ordering
 * @property string $position
 * @property string $checked_out
 * @property string $checked_out_time
 * @property string $publish_up
 * @property string $publish_down
 * @property integer $published
 * @property string $access
 * @property integer $showtitle
 * @property string $params
 * @property string $added_user
 * @property string $date_added
 * @property string $modified_user
 * @property string $date_modified
 * @property string $language_id
 *
 * @property Users $addedUser
 * @property Users $modifiedUser
 */
class Modules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%modules}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_path'], 'required'],
            [['core', 'client', 'ordering', 'checked_out', 'checked_out_time', 'publish_up', 'publish_down', 'published', 'access', 'showtitle', 'added_user', 'date_added', 'modified_user', 'date_modified'], 'integer'],
            [['config', 'params'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['module_name', 'position'], 'string', 'max' => 50],
            [['module_path'], 'string', 'max' => 200],
            [['note'], 'string', 'max' => 255],
            [['language_id'], 'string', 'max' => 7],
            //[['added_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['added_user' => 'user_id']],
            //[['modified_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['modified_user' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'module_id' => Yii::t('app', 'Module ID'),
            'title' => Yii::t('app', 'Title'),
            'module_name' => Yii::t('app', 'Module Name'),
            'module_path' => Yii::t('app', 'Module Path'),
            'note' => Yii::t('app', 'Note'),
            'core' => Yii::t('app', 'Core'),
            'client' => Yii::t('app', 'Client'),
            'config' => Yii::t('app', 'Config'),
            'ordering' => Yii::t('app', 'Ordering'),
            'position' => Yii::t('app', 'Position'),
            'checked_out' => Yii::t('app', 'Checked Out'),
            'checked_out_time' => Yii::t('app', 'Checked Out Time'),
            'publish_up' => Yii::t('app', 'Publish Up'),
            'publish_down' => Yii::t('app', 'Publish Down'),
            'published' => Yii::t('app', 'Published'),
            'access' => Yii::t('app', 'Access'),
            'showtitle' => Yii::t('app', 'Showtitle'),
            'params' => Yii::t('app', 'Params'),
            'added_user' => Yii::t('app', 'Added User'),
            'date_added' => Yii::t('app', 'Date Added'),
            'modified_user' => Yii::t('app', 'Modified User'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddedUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'added_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'modified_user']);
    }
}
