<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_bot".
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $first_name
 * @property string|null $username
 * @property string|null $step
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class UserBot extends \soft\db\ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
    * {@inheritdoc}
    */
    public static function tableName()
    {
        return 'user_bot';
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['user_id', 'first_name', 'username', 'step'], 'string', 'max' => 255],
        ];
    }

    /**
    * {@inheritdoc}
    */
    public function labels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'username' => Yii::t('app', 'Username'),
            'step' => Yii::t('app', 'Step'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    //</editor-fold>

}
