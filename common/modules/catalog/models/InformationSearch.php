<?php

namespace common\modules\catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\catalog\models\Information;

/**
 * InformationSearch represents the model behind the search form about `common\modules\catalog\models\Information`.
 */
class InformationSearch extends Information
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['information_id', 'status', 'bottom'], 'integer'],
            [['title', 'description', 'meta_title', 'meta_description', 'meta_keyword', 'language_id'], 'safe'],
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
        $query = Information::find();

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
            'information_id' => $this->information_id,
            'status' => $this->status,
            'bottom' => $this->bottom,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword])
            ->andFilterWhere(['like', 'language_id', $this->language_id]);

        return $dataProvider;
    }
}
