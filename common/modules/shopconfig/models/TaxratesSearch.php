<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\TaxRates;

/**
 * TaxratesSearch represents the model behind the search form about `common\modules\shopconfig\models\TaxRates`.
 */
class TaxratesSearch extends TaxRates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_rates_id', 'tax_zone_id', 'tax_class_id', 'tax_priority', 'date_modified', 'date_added'], 'integer'],
            [['tax_rate'], 'number'],
            [['tax_description'], 'safe'],
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
        $query = TaxRates::find();

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
            'tax_rates_id' => $this->tax_rates_id,
            'tax_zone_id' => $this->tax_zone_id,
            'tax_class_id' => $this->tax_class_id,
            'tax_priority' => $this->tax_priority,
            'tax_rate' => $this->tax_rate,
            'date_modified' => $this->date_modified,
            'date_added' => $this->date_added,
        ]);

        $query->andFilterWhere(['like', 'tax_description', $this->tax_description]);

        return $dataProvider;
    }
}
