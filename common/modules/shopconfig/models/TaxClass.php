<?php

namespace common\modules\shopconfig\models;

use Yii;

/**
 * This is the model class for table "{{%tax_class}}".
 *
 * @property string $tax_class_id
 * @property string $tax_class_title
 * @property string $tax_class_description
 * @property string $date_modified
 * @property string $date_added
 *
 * @property Product[] $products
 * @property TaxRates[] $taxRates
 */
class TaxClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tax_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_class_title', 'tax_class_description'], 'required'],
            [['date_modified', 'date_added'], 'integer'],
            [['tax_class_title'], 'string', 'max' => 32],
            [['tax_class_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tax_class_id' => Yii::t('app', 'Tax Class ID'),
            'tax_class_title' => Yii::t('app', 'Tax Class Title'),
            'tax_class_description' => Yii::t('app', 'Tax Class Description'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'date_added' => Yii::t('app', 'Date Added'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['tax_class_id' => 'tax_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxRates()
    {
        return $this->hasMany(TaxRates::className(), ['tax_class_id' => 'tax_class_id']);
    }
}
