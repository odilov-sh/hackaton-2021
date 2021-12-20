<?php

namespace common\models\query;

use common\models\User;

class UserQuery extends \soft\db\ActiveQuery
{

    public function client()
    {
        return $this->andWhere(['user.type_id' => User::TYPE_CLIENT]);
    }

    public function doctor()
    {
        return $this->andWhere(['user.type_id' => User::TYPE_DOCTOR]);
    }

}
