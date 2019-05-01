<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Children;

class ChildrenSearch extends Children
{
    /**
     * @inheritdoc
     */
    public $search;
    public function rules()
    {
        return [
            [['id', 'member_id'], 'integer'],
            [['name', 'gender', 'search','age', 'birth_cert_no'], 'safe'],
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

    public function search($params)
    {
        $query = Children::find();

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
            ->orFilterWhere(['like', 'gender', $this->search])
            ->orFilterWhere(['like', 'age', $this->search])
            ->orFilterWhere(['like', 'birth_cert_no', $this->search]);

        return $dataProvider;
    }
}
