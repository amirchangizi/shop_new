<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%weight_class}}".
 *
 * @property string $weight_class_id
 * @property string $title
 * @property string $unit
 * @property string $value
 * @property string $language_id
 *
 * @property Product[] $products
 * @property Language $language
 */
class WeightClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%weight_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'unit', 'value'], 'required'],
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
            'weight_class_id' => Yii::t('app', 'Weight Class ID'),
            'title' => Yii::t('app', 'Title'),
            'unit' => Yii::t('app', 'Unit'),
            'value' => Yii::t('app', 'Value'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['weight_class_id' => 'weight_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'language_id']);
    }
}
