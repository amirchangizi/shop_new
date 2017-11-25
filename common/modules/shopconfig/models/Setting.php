<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property integer $setting_id
 * @property string $code
 * @property string $key
 * @property string $value
 * @property string $method
 * @property string $class_name
 * @property string $language_id
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'key', 'value'], 'required'],
            [['value'], 'string'],
            [['code', 'key'], 'string', 'max' => 64],
            [['method', 'class_name'], 'string', 'max' => 100],
            [['language_id'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setting_id' => Yii::t('app', 'Setting ID'),
            'code' => Yii::t('app', 'Code'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'method' => Yii::t('app', 'Method'),
            'class_name' => Yii::t('app', 'Class Name'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }
}
