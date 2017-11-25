<?php

namespace common\modules\catalog\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%manufacturers}}".
 *
 * @property string $manufacturers_id
 * @property string $manufacturers_name
 * @property string $manufacturers_url
 * @property string $manufacturers_image
 * @property string $date_added
 * @property string $date_modified
 *
 * @property Product[] $products
 */
class Manufacturers extends \yii\db\ActiveRecord
{

    public $imageFile;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_added',
                'updatedAtAttribute' => 'date_modified',
                'value' => time(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%manufacturers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manufacturers_name'], 'required'],
            ['manufacturers_url', 'url', 'defaultScheme' => 'http'],
            [['date_added', 'date_modified'], 'integer'],
            [['manufacturers_name'], 'string', 'max' => 32],
            [['manufacturers_url', 'manufacturers_image'], 'string', 'max' => 64],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manufacturers_id' => Yii::t('app', 'Manufacturer ID'),
            'manufacturers_name' => Yii::t('app', 'Manufacturer Name'),
            'manufacturers_url' => Yii::t('app', 'Manufacturer Url'),
            'manufacturers_image' => Yii::t('app', 'Manufacturer Image'),
            'date_added' => Yii::t('app', 'Date Added'),
            'date_modified' => Yii::t('app', 'Date Modified'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['manufacturer_id' => 'manufacturers_id']);
    }

    public function upload()
    {
        if (!$this->imageFile && !$this->isNewRecord) {
//            $this->imageFile = $this->oldAttributes['imageFile'];
            return true;
        }
        if ($this->imageFile) {
            $path = Yii::getAlias('@app/web/uploads/manufacturers/images/');
            $this->manufacturers_image = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        }
        return true;


    }

    public function beforeSave($insert)
    {
        $this->upload();
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
