<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "information".
 *
 * @property integer $information_id
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property integer $bottom
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $language_id
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['status', 'bottom'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['meta_title', 'meta_description', 'meta_keyword'], 'string', 'max' => 255],
            [['language_id'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'information_id' => Yii::t('app', 'Information ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'bottom' => Yii::t('app', 'Bottom'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_keyword' => Yii::t('app', 'Meta Keyword'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }
}
