<?php

namespace common\modules\catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\catalog\models\Manufacturers;

/**
 * ManufacturersSearch represents the model behind the search form about `common\modules\catalog\models\Manufacturers`.
 */
class ManufacturersSearch extends Manufacturers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manufacturers_id', 'date_added', 'date_modified'], 'integer'],
            [['manufacturers_name', 'manufacturers_url', 'manufacturers_image'], 'safe'],
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
        $query = Manufacturers::find();

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
            'manufacturers_id' => $this->manufacturers_id,
            'date_added' => $this->date_added,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'manufacturers_name', $this->manufacturers_name])
            ->andFilterWhere(['like', 'manufacturers_url', $this->manufacturers_url])
            ->andFilterWhere(['like', 'manufacturers_image', $this->manufacturers_image]);

        return $dataProvider;
    }
}
