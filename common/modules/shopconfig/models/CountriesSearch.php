<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\Countries;

/**
 * CountriesSearch represents the model behind the search form about `common\modules\shopconfig\models\Countries`.
 */
class CountriesSearch extends Countries
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countries_id'], 'integer'],
            [['countries_name', 'countries_iso_code_2', 'countries_iso_code_3'], 'safe'],
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
        $query = Countries::find();

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
            'countries_id' => $this->countries_id,
        ]);

        $query->andFilterWhere(['like', 'countries_name', $this->countries_name])
            ->andFilterWhere(['like', 'countries_iso_code_2', $this->countries_iso_code_2])
            ->andFilterWhere(['like', 'countries_iso_code_3', $this->countries_iso_code_3]);

        return $dataProvider;
    }
}
