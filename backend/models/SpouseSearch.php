<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Spouse;

/**
 * SpouseSearch represents the model behind the search form of `backend\models\Spouse`.
 */
class SpouseSearch extends Spouse
{
    /**
     * @inheritdoc
     */
    public $search;
    public function rules()
    {
        return [
            [['id', 'member_id'], 'integer'],
            [['name', 'phonenumber','search', 'email', 'address', 'national_id'], 'safe'],
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
        $query = Spouse::find();

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
        $query->orFilterWhere([
            'id' => $this->search,
            'member_id' => $this->search,
        ]);

        $query->orFilterWhere(['like', 'name', $this->search])
            ->orFilterWhere(['like', 'phonenumber', $this->search])
            ->orFilterWhere(['like', 'email', $this->search])
            ->orFilterWhere(['like', 'address', $this->search])
            ->orFilterWhere(['like', 'national_id', $this->search]);

        return $dataProvider;
    }
}
