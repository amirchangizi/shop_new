<?php

namespace common\modules\shopconfig\models;

use \common\helpers\LanguageHelper;
use common\models\enums\SectionStatus;
use common\modules\shopconfig\Behaviors\LanguageBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%shop_status}}".
 *
 * @property string $status_id
 * @property string $status_name
 * @property string $status_section
 * @property string $language_id
 *
 * @property ReturnHistory[] $returnHistories
 */
class ShopStatus extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_name'], 'required'],
            [['status_name'], 'string', 'max' => 100],
            [['status_section'], 'string', 'max' => 50],

            ['language_id', 'in', 'range' => LanguageHelper::getByName()],
            ['status_section', 'in', 'range' => SectionStatus::getConstantsByName()],

            [['language_id'], 'string', 'max' => 10],
            [['status_name', 'status_section', 'language_id'], 'unique', 'targetAttribute' => ['status_name', 'status_section', 'language_id'], 'message' => 'The combination of Status Name, Status Section and Language ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => Yii::t('app', 'Status ID'),
            'status_name' => Yii::t('app', 'Status Name'),
            'status_section' => Yii::t('app', 'Status Section'),
            'language_id' => Yii::t('app', 'Language'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturnHistories()
    {
        return $this->hasMany(ReturnHistory::className(), ['return_status_id' => 'status_id']);
    }
}
