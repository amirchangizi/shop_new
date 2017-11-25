<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\TaxClass;

/**
 * TaxclassSearch represents the model behind the search form about `common\modules\shopconfig\models\TaxClass`.
 */
class TaxclassSearch extends TaxClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_class_id', 'date_modified', 'date_added'], 'integer'],
            [['tax_class_title', 'tax_class_description'], 'safe'],
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
        $query = TaxClass::find();

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
            'tax_class_id' => $this->tax_class_id,
            'date_modified' => $this->date_modified,
            'date_added' => $this->date_added,
        ]);

        $query->andFilterWhere(['like', 'tax_class_title', $this->tax_class_title])
            ->andFilterWhere(['like', 'tax_class_description', $this->tax_class_description]);

        return $dataProvider;
    }
}
