<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\ShopStatus;

/**
 * ShopstatusSearch represents the model behind the search form about `common\modules\shopconfig\models\ShopStatus`.
 */
class ShopstatusSearch extends ShopStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id'], 'integer'],
            [['status_name', 'status_section', 'language_id'], 'safe'],
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
        $query = ShopStatus::find();

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
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'status_name', $this->status_name])
            ->andFilterWhere(['like', 'status_section', $this->status_section])
            ->andFilterWhere(['like', 'language_id', $this->language_id]);

        return $dataProvider;
    }
}
