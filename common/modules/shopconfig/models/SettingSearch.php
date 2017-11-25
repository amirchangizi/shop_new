<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\shopconfig\models\Setting;

/**
 * SettingSearch represents the model behind the search form about `common\modules\shopconfig\models\Setting`.
 */
class SettingSearch extends Setting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setting_id'], 'integer'],
            [['code', 'key', 'value', 'method', 'class_name', 'language_id'], 'safe'],
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
        $query = Setting::find();

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
            'setting_id' => $this->setting_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]) ;

            $query->andFilterWhere(['like', 'language_id', $this->language_id]);


        if(empty($this->language_id))
            $query->andFilterWhere(['like', 'language_id', Yii::$app->language]);

        $query->groupBy('language_id');

        return $dataProvider;
    }
}
