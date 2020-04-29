<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quesions;

/**
 * QuesionsSearch represents the model behind the search form of `app\models\Quesions`.
 */
class QuesionsSearch extends Quesions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fehlerpunkte', 'points'], 'integer'],
            [['amtl_frage_nr',  'image'], 'safe'],
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
        $query = Quesions::find();

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
            'fehlerpunkte' => $this->fehlerpunkte,
        ]);
        $query->andFilterWhere(['like', 'amtl_frage_nr', $this->amtl_frage_nr])
            ->andFilterWhere(['like', 'image', $this->image]);
          
        return $dataProvider;
    }
}
