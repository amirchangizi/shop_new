<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\GeoZones;

/**
 * GeozonesSearch represents the model behind the search form about `common\modules\shopconfig\models\GeoZones`.
 */
class GeozonesSearch extends GeoZones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['geo_zone_id', 'last_modified', 'date_added'], 'integer'],
            [['geo_zone_name', 'geo_zone_description'], 'safe'],
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
        $query = GeoZones::find();

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
            'geo_zone_id' => $this->geo_zone_id,
            'last_modified' => $this->last_modified,
            'date_added' => $this->date_added,
        ]);

        $query->andFilterWhere(['like', 'geo_zone_name', $this->geo_zone_name])
            ->andFilterWhere(['like', 'geo_zone_description', $this->geo_zone_description]);

        return $dataProvider;
    }
}
