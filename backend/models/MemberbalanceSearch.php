<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Memberbalance;

/**
 * MemberbalanceSearch represents the model behind the search form of `backend\models\Memberbalance`.
 */
class MemberbalanceSearch extends Memberbalance
{
    public $search;
    public function rules()
    {
        return [
            [['id', 'member_id', 'balance'], 'integer'],
            [['id', 'member_id', 'search','balance'], 'safe'],
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
        $query = Memberbalance::find();

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
            'balance' => $this->search,
        ]);

        return $dataProvider;
    }
}
