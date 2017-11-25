<?php

namespace common\modules\shopconfig\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\catalog\models\Category;

/**
 * CategorySearch represents the model behind the search form about `common\modules\catalog\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'parent_id', 'lft', 'rgt', 'level', 'sort_order', 'status', 'date_added', 'date_modified'], 'integer'],
            [['name', 'hits', 'description', 'meta_title', 'meta_description', 'meta_keyword', 'image', 'params', 'language_id'], 'safe'],
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
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder'=>['lft'=>SORT_ASC] ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'category_id' => $this->category_id,
            'parent_id' => $this->parent_id,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'level' => $this->level,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'date_added' => $this->date_added,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['>', 'category_id', 1])
            ->andFilterWhere(['like', 'hits', $this->hits])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'params', $this->params])
            ->andFilterWhere(['like', 'language_id', $this->language_id]);

        return $dataProvider;
    }
}
