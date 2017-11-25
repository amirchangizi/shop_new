<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\Currency;

/**
 * CurrencySearch represents the model behind the search form about `common\modules\shopconfig\models\Currency`.
 */
class CurrencySearch extends Currency
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_id', 'currency_min', 'currency_max', 'currency_last_update', 'is_default', 'currency_possition', 'decimal_placement'], 'integer'],
            [['currency_title', 'currency_name', 'currency_symbol'], 'safe'],
            [['currency_value'], 'number'],
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
        $query = Currency::find();

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
            'currency_id' => $this->currency_id,
            'currency_value' => $this->currency_value,
            'currency_min' => $this->currency_min,
            'currency_max' => $this->currency_max,
            'currency_last_update' => $this->currency_last_update,
            'is_default' => $this->is_default,
            'currency_possition' => $this->currency_possition,
            'decimal_placement' => $this->decimal_placement,
        ]);

        $query->andFilterWhere(['like', 'currency_title', $this->currency_title])
            ->andFilterWhere(['like', 'currency_name', $this->currency_name])
            ->andFilterWhere(['like', 'currency_symbol', $this->currency_symbol]);

        return $dataProvider;
    }
}
