<?php

namespace frontend\modules\doctor\models;

class Client extends \common\models\User
{


    public static function find()
    {
        return parent::find()->client();
    }


}
