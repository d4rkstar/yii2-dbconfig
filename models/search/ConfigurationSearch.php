<?php

namespace d4rkstar\dbconfig\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use d4rkstar\dbconfig\models\Configuration;

/**
 * ConfigurationSearch represents the model behind the search form about `d4rkstar\dbconfig\models\Configuration`.
 */
class ConfigurationSearch extends Configuration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ordering'], 'integer'],
            [['key', 'value', 'group', 'type', 'description', 'options'], 'safe'],
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
        $query = Configuration::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'group'=>SORT_ASC,
                    'ordering'=>SORT_ASC,
                    'key'=>SORT_ASC,


                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'ordering' => $this->ordering,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'group', $this->group])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'options', $this->options]);

        return $dataProvider;
    }
}
