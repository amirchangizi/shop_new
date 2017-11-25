<?php

namespace app\modules\modulemanagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\modulemanagement\models\Modules;

/**
 * ModulesSearch represents the model behind the search form about `app\modules\modulemanagement\models\Modules`.
 */
class ModulesSearch extends Modules
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id', 'core', 'client', 'ordering', 'checked_out', 'checked_out_time', 'publish_up', 'publish_down', 'published', 'access', 'showtitle', 'added_user', 'date_added', 'modified_user', 'date_modified'], 'integer'],
            [['title', 'module_name', 'module_path', 'note', 'config', 'position', 'params', 'language_id'], 'safe'],
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
        $query = Modules::find();

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
            'module_id' => $this->module_id,
            'core' => $this->core,
            'client' => $this->client,
            'ordering' => $this->ordering,
            'checked_out' => $this->checked_out,
            'checked_out_time' => $this->checked_out_time,
            'publish_up' => $this->publish_up,
            'publish_down' => $this->publish_down,
            'published' => $this->published,
            'access' => $this->access,
            'showtitle' => $this->showtitle,
            'added_user' => $this->added_user,
            'date_added' => $this->date_added,
            'modified_user' => $this->modified_user,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'module_name', $this->module_name])
            ->andFilterWhere(['like', 'module_path', $this->module_path])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'config', $this->config])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'params', $this->params])
            ->andFilterWhere(['like', 'language_id', $this->language_id]);

        return $dataProvider;
    }
}
