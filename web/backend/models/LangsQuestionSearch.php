<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LangsQuestion;

/**
 * LangsQuestionSearch represents the model behind the search form of `app\models\LangsQuestion`.
 */
class LangsQuestionSearch extends LangsQuestion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'question_id'], 'integer'],
            [['languege', 'question', 'answer_yes', 'answer_no1', 'answer_no2'], 'safe'],
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
        $query = LangsQuestion::find();

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
            'question_id' => $this->question_id,
        ]);

        $query->andFilterWhere(['like', 'languege', $this->languege])
            ->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer_yes', $this->answer_yes])
            ->andFilterWhere(['like', 'answer_no1', $this->answer_no1])
            ->andFilterWhere(['like', 'answer_no2', $this->answer_no2]);

        return $dataProvider;
    }
}

