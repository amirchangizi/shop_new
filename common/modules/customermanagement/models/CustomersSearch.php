<?php

namespace common\modules\customermanagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\customermanagement\models\Customers;

/**
 * CustomersSearch represents the model behind the search form about `common\modules\customermanagement\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'customer_group_id', 'is_block', 'user_id', 'customer_parent_id', 'create_time', 'update_time', 'customer_max_credit', 'is_agency'], 'integer'],
            [['customer_name', 'customer_username', 'customer_password', 'access_token', 'customer_email', 'phone', 'mobile'], 'safe'],
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
        $query = Customers::find();

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
            'customer_id' => $this->customer_id,
            'customer_group_id' => $this->customer_group_id,
            'is_block' => $this->is_block,
            'user_id' => $this->user_id,
            'customer_parent_id' => $this->customer_parent_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'customer_max_credit' => $this->customer_max_credit,
            'is_agency' => $this->is_agency,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_username', $this->customer_username])
            ->andFilterWhere(['like', 'customer_password', $this->customer_password])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'customer_email', $this->customer_email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mobile', $this->mobile]);

        return $dataProvider;
    }
}
