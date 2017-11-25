<?php

namespace common\modules\catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\catalog\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\modules\catalog\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'stock_status_id', 'manufacturer_id', 'shipping', 'tax_class_id', 'date_available', 'date_expire', 'weight_class_id', 'length_class_id', 'Special', 'subtract', 'minimum', 'sort_order', 'status', 'viewed', 'date_added', 'date_modified'], 'integer'],
            [['name', 'description', 'tag', 'meta_title', 'meta_description', 'meta_keyword', 'model', 'sku', 'upc', 'ean', 'jan', 'isbn', 'mpn', 'image', 'language_id'], 'safe'],
            [['price', 'weight', 'length', 'width', 'height'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'stock_status_id' => $this->stock_status_id,
            'manufacturer_id' => $this->manufacturer_id,
            'shipping' => $this->shipping,
            'price' => $this->price,
            'tax_class_id' => $this->tax_class_id,
            'date_available' => $this->date_available,
            'date_expire' => $this->date_expire,
            'weight' => $this->weight,
            'weight_class_id' => $this->weight_class_id,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'length_class_id' => $this->length_class_id,
            'Special' => $this->Special,
            'subtract' => $this->subtract,
            'minimum' => $this->minimum,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'viewed' => $this->viewed,
            'date_added' => $this->date_added,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'upc', $this->upc])
            ->andFilterWhere(['like', 'ean', $this->ean])
            ->andFilterWhere(['like', 'jan', $this->jan])
            ->andFilterWhere(['like', 'isbn', $this->isbn])
            ->andFilterWhere(['like', 'mpn', $this->mpn])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'language_id', $this->language_id]);

        return $dataProvider;
    }
}
