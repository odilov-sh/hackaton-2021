<?php

namespace frontend\modules\doctor\models;

use common\models\User;

class Client extends User
{

    const SCENARIO_DOCTOR_FORM = 'doctorForm';

    public function rules()
    {
        return [
            [['firstname', 'passport', 'date_of_birth'], 'required'],
            [['firstname', 'lastname', 'middlename', 'passport', 'street', 'house_number', 'phone',], 'string'],
            [['region_id', 'district_id', 'quarter_id', 'gender_id'], 'integer'],
            ['date_of_birth', 'safe'],
        ];
    }

    public static function find()
    {
        return parent::find()->client();
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios [self::SCENARIO_DOCTOR_FORM] = [
            'lastname', 'firstname', 'middlename',
            'region_id', 'district_id', 'quarter_id',
            'street', 'house_number', 'phone',
            'passport', 'date_of_birth', 'gender_id'
        ];
        return $scenarios;
    }


}
