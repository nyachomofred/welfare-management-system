<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Member;

/**
 * MemberSearch represents the model behind the search form of `backend\models\Member`.
 */
class MemberSearch extends Member
{
    public $search;
    public function rules()
    {
        return [
            [['id', 'idno'], 'integer'],
            [['name', 'gender', 'search','phonenumber', 'email'], 'safe'],
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
        $query = Member::find();

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

        $query->orFilterWhere(['like', 'name', $this->search])
            ->orFilterWhere(['like', 'gender', $this->search])
            ->orFilterWhere(['like','id',$this->search])
            ->orFilterWhere(['like','idno',$this->search])
            ->orFilterWhere(['like', 'phonenumber', $this->search])
            ->orFilterWhere(['like', 'email', $this->search]);
        return $dataProvider;
    }
}
