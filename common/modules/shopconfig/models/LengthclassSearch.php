<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\LengthClass;

/**
 * LengthclassSearch represents the model behind the search form about `common\modules\shopconfig\models\LengthClass`.
 */
class LengthclassSearch extends LengthClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['length_class_id'], 'integer'],
            [['title', 'unit', 'language_id'], 'safe'],
            [['value'], 'number'],
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
        $query = LengthClass::find();

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
            'length_class_id' => $this->length_class_id,
            'value' => $this->value,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'language_id', $this->language_id]);

        return $dataProvider;
    }
}
