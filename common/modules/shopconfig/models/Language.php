<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%language}}".
 *
 * @property string $language_id
 * @property string $language
 * @property string $country
 * @property string $name
 * @property string $name_ascii
 * @property integer $status
 * @property integer $is_rtl
 *
 * @property LengthClass[] $lengthClasses
 * @property WeightClass[] $weightClasses
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'language', 'country', 'status'], 'required'],
            [['status', 'is_rtl'], 'integer'],
            [['name', 'language_id' ,'name_ascii' ,'country'], 'match', 'pattern' => '/^[A-Za-z0-9_~\-@\\^\(\)]+$/'],
            [['language_id'], 'string', 'max' => 5],
            [['language', 'country'], 'string', 'max' => 3],
            [['name', 'name_ascii'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Yii::t('app', 'Language ID'),
            'language' => Yii::t('app', 'Language code'),
            'country' => Yii::t('app', 'Country'),
            'name' => Yii::t('app', 'Name'),
            'name_ascii' => Yii::t('app', 'Name Ascii'),
            'status' => Yii::t('app', 'Status'),
            'is_rtl' => Yii::t('app', ' Rtl'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLengthClasses()
    {
        return $this->hasMany(LengthClass::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeightClasses()
    {
        return $this->hasMany(WeightClass::className(), ['language_id' => 'language_id']);
    }
}
