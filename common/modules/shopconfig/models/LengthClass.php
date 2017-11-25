<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%length_class}}".
 *
 * @property string $length_class_id
 * @property string $title
 * @property string $value
 * @property string $unit
 * @property string $language_id
 *
 * @property Language $language
 * @property Product[] $products
 */
class LengthClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%length_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'value', 'unit'], 'required'],
            [['value'], 'number'],
            [['title'], 'string', 'max' => 32],
            [['unit'], 'string', 'max' => 4],
            [['language_id'], 'string', 'max' => 5],
            [['title', 'language_id'], 'unique', 'targetAttribute' => ['title', 'language_id'], 'message' => 'The combination of Title and Language ID has already been taken.'],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'length_class_id' => Yii::t('app', 'Length Class ID'),
            'title' => Yii::t('app', 'Title'),
            'value' => Yii::t('app', 'Value'),
            'unit' => Yii::t('app', 'Unit'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['length_class_id' => 'length_class_id']);
    }
}
