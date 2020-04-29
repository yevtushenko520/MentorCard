<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\School;

/**
 * SchoolSearch represents the model behind the search form of `app\models\School`.
 */
class SchoolSearch extends School
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'telephone_no', 'mobile_number', 'post_code', 'iban', 'bic'], 'integer'],
            [['school_name', 'first_name', 'last_name', 'password', 'date_birth', 'email', 'street', 'city'], 'safe'],
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
        $query = School::find();

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
            'telephone_no' => $this->telephone_no,
            'mobile_number' => $this->mobile_number,
            'post_code' => $this->post_code,
            'iban' => $this->iban,
            'bic' => $this->bic,
        ]);

        $query->andFilterWhere(['like', 'school_name', $this->school_name])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'date_birth', $this->date_birth])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}
