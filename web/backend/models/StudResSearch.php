<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudRes;

/**
 * StudResSearch represents the model behind the search form of `app\models\StudRes`.
 */
class StudResSearch extends StudRes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'res_id'], 'integer'],
            [['username', 'first_name', 'last_name', 'password', 'day_birth', 'country', 'place_birth', 'phone_number', 'active_code', 'categor', 'email'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = StudRes::find();

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
            'id' => $this->id,
            'res_id' => $this->res_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'day_birth', $this->day_birth])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'place_birth', $this->place_birth])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'active_code', $this->active_code])
            ->andFilterWhere(['like', 'categor', $this->categor])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
