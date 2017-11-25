<?php

namespace common\modules\customermanagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\customermanagement\models\CustomerGroup;

/**
 * CustomergroupSearch represents the model behind the search form about `common\modules\customermanagement\models\CustomerGroup`.
 */
class CustomergroupSearch extends CustomerGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_group_id', 'is_default'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $query = CustomerGroup::find();

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
            'customer_group_id' => $this->customer_group_id,
            'is_default' => $this->is_default,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
