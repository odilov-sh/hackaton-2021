<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reception;

class ReceptionSearch extends Reception
{

    public function rules()
    {
        return [
            [['id', 'client_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['weight', 'fever', 'height'], 'number'],
            [['blood_pressure', 'complaint', 'analiz_result', 'diagnos'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($query=null, $defaultPageSize = 20, $params=null)
    {

        if($params == null){
            $params = Yii::$app->request->queryParams;
        }
        if($query == null){
            $query = Reception::find();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => $defaultPageSize,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'client_id' => $this->client_id,
            'weight' => $this->weight,
            'fever' => $this->fever,
            'height' => $this->height,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'blood_pressure', $this->blood_pressure])
            ->andFilterWhere(['like', 'complaint', $this->complaint])
            ->andFilterWhere(['like', 'analiz_result', $this->analiz_result])
            ->andFilterWhere(['like', 'diagnos', $this->diagnos]);

        return $dataProvider;
    }
}
