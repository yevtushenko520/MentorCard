<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FrontendLangs;

/**
 * FrontendLangsSearch represents the model behind the search form of `app\models\FrontendLangs`.
 */
class FrontendLangsSearch extends FrontendLangs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lang_id'], 'integer'],
            [['first_title_home', 'sec_title_home', 'first_title_about', 'sec_title_about', 'one_about', 'one_title_about', 'two_about', 'two_title_about', 'three_about', 'three_title_about', 'four_about', 'four_title_about', 'five_about', 'five_title_about', 'six_about', 'six_title_about', 'first_title_feature', 'sec_title_feature', 'three_title_feature', 'rec_feature', 'satif_feature', 'follow_feature', 'first_title_creative', 'sec_titlee_creative', 'three_title_creative', 'first_title_design', 'sec_title_design', 'up_design', 'sat_design', 'rec_design', 'galery_first', 'galery_sec', 'first_title_easy', 'sec_title_easy', 'three_title_easy'], 'safe'],
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
        $query = FrontendLangs::find();

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
            'lang_id' => $this->lang_id,
        ]);

        $query->andFilterWhere(['like', 'first_title_home', $this->first_title_home])
            ->andFilterWhere(['like', 'sec_title_home', $this->sec_title_home])
            ->andFilterWhere(['like', 'first_title_about', $this->first_title_about])
            ->andFilterWhere(['like', 'sec_title_about', $this->sec_title_about])
            ->andFilterWhere(['like', 'one_about', $this->one_about])
            ->andFilterWhere(['like', 'one_title_about', $this->one_title_about])
            ->andFilterWhere(['like', 'two_about', $this->two_about])
            ->andFilterWhere(['like', 'two_title_about', $this->two_title_about])
            ->andFilterWhere(['like', 'three_about', $this->three_about])
            ->andFilterWhere(['like', 'three_title_about', $this->three_title_about])
            ->andFilterWhere(['like', 'four_about', $this->four_about])
            ->andFilterWhere(['like', 'four_title_about', $this->four_title_about])
            ->andFilterWhere(['like', 'five_about', $this->five_about])
            ->andFilterWhere(['like', 'five_title_about', $this->five_title_about])
            ->andFilterWhere(['like', 'six_about', $this->six_about])
            ->andFilterWhere(['like', 'six_title_about', $this->six_title_about])
            ->andFilterWhere(['like', 'first_title_feature', $this->first_title_feature])
            ->andFilterWhere(['like', 'sec_title_feature', $this->sec_title_feature])
            ->andFilterWhere(['like', 'three_title_feature', $this->three_title_feature])
            ->andFilterWhere(['like', 'rec_feature', $this->rec_feature])
            ->andFilterWhere(['like', 'satif_feature', $this->satif_feature])
            ->andFilterWhere(['like', 'follow_feature', $this->follow_feature])
            ->andFilterWhere(['like', 'first_title_creative', $this->first_title_creative])
            ->andFilterWhere(['like', 'sec_titlee_creative', $this->sec_titlee_creative])
            ->andFilterWhere(['like', 'three_title_creative', $this->three_title_creative])
            ->andFilterWhere(['like', 'first_title_design', $this->first_title_design])
            ->andFilterWhere(['like', 'sec_title_design', $this->sec_title_design])
            ->andFilterWhere(['like', 'up_design', $this->up_design])
            ->andFilterWhere(['like', 'sat_design', $this->sat_design])
            ->andFilterWhere(['like', 'rec_design', $this->rec_design])
            ->andFilterWhere(['like', 'galery_first', $this->galery_first])
            ->andFilterWhere(['like', 'galery_sec', $this->galery_sec])
            ->andFilterWhere(['like', 'first_title_easy', $this->first_title_easy])
            ->andFilterWhere(['like', 'sec_title_easy', $this->sec_title_easy])
            ->andFilterWhere(['like', 'three_title_easy', $this->three_title_easy]);

        return $dataProvider;
    }
}
