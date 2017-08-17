<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Interview;

/**
 * InterviewSearch represents the model behind the search form about `app\models\Interview`.
 */
class InterviewSearch extends Interview
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'data_status', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['interviewee', 'interviewer', 'inteview_date', 'remarks'], 'safe'],
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
        $query = Interview::find();

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
            'data_status' => $this->data_status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'inteview_date' => $this->inteview_date,
        ]);

        $query->andFilterWhere(['like', 'interviewee', $this->interviewee])
            ->andFilterWhere(['like', 'interviewer', $this->interviewer])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
