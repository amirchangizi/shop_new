<?php

namespace common\modules\catalog\models;

use common\helpers\CategoryHelper;
use creocoder\nestedsets\NestedSetsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property string $category_id
 * @property string $name
 * @property string $hits
 * @property string $parent_id
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $image
 * @property string $lft
 * @property string $rgt
 * @property string $level
 * @property string $sort_order
 * @property string $params
 * @property integer $status
 * @property string $date_added
 * @property string $date_modified
 * @property string $language_id
 *
 * @property Category $parent
 * @property Category[] $categories
 * @property CouponCategory[] $couponCategories
 * @property Coupon[] $coupons
 * @property ProductToCategory[] $productToCategories
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{

    public $categoryName  ;

    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                // 'treeAttribute' => 'tree',
                 'leftAttribute' => 'lft',
                 'rightAttribute' => 'rgt',
                 'depthAttribute' => 'level',
            ],
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
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['parent_id', 'lft', 'rgt', 'level', 'sort_order', 'status', 'date_added', 'date_modified'], 'integer'],
            [['description'], 'string'],

            ['parent_id', 'in', 'range' => CategoryHelper::getAllCategoryId()],
            [['name','categoryName','meta_title','meta_description','meta_keyword','description'], 'match', 'pattern' => '/^[A-Za-z0-9_~\-@\\^\(\)]+$/'] ,

            [['name','categoryName'], 'string', 'max' => 150],
            [['hits'], 'string', 'max' => 200],
            [['meta_title', 'meta_description', 'meta_keyword', 'params'], 'string', 'max' => 250],
            [['image'], 'string', 'max' => 255],
            [['language_id'], 'string', 'max' => 5],
            //[['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'hits' => Yii::t('app', 'Hits'),
            'parent_id' => Yii::t('app', 'Parent'),
            'categoryName' => Yii::t('app', 'Parent'),
            'description' => Yii::t('app', 'Description'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_keyword' => Yii::t('app', 'Meta Keyword'),
            'image' => Yii::t('app', 'Image'),
            'lft' => Yii::t('app', 'Lft'),
            'rgt' => Yii::t('app', 'Rgt'),
            'level' => Yii::t('app', 'Level'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'params' => Yii::t('app', 'Params'),
            'status' => Yii::t('app', 'Status'),
            'date_added' => Yii::t('app', 'Date Added'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'language_id' => Yii::t('app', 'Language'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getCouponCategories()
    {
        return $this->hasMany(CouponCategory::className(), ['category_id' => 'category_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getCoupons()
    {
        return $this->hasMany(Coupon::className(), ['coupon_id' => 'coupon_id'])->viaTable('{{%coupon_category}}', ['category_id' => 'category_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductToCategories()
    {
        return $this->hasMany(ProductToCategory::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'product_id'])->viaTable('{{%product_to_category}}', ['category_id' => 'category_id']);
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @return CategoryQuery
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

}
