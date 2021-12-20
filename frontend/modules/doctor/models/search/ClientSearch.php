<?php

namespace frontend\modules\doctor\models\search;

use soft\helpers\ArrayHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\doctor\models\Client;

class ClientSearch extends Client
{

    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at', 'type_id'], 'integer'],
            [['firstname', 'lastname', 'middlename', 'passport', 'date_of_birth'], 'safe'],
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
            $query = Client::find();
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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname]);


        if ($this->date_of_birth) {

            $data = explode('.', $this->date_of_birth);

            if (!empty($data)) {

                $year = $data[0];
                $month = ArrayHelper::getArrayValue($data, 1, 01);
                $day = ArrayHelper::getArrayValue($data, 2, 01);

                $count = count($data);
                $add = '+1 day';
                if ($count == 1) {
                    $add = '+1 year';
                }
                if ($count == 2) {
                    $add = '+1 month';
                }

                $from = strtotime("$year-$month-$day");
                $end = strtotime($add, $from);

                $query->andWhere(['>=', 'date_of_birth', $from]);
                $query->andWhere(['<', 'date_of_birth', $end]);
            }


        }

        return $dataProvider;
    }
}
