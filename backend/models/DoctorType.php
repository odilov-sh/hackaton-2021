<?php

namespace backend\models;

use soft\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "doctor_type".
 *
 * @property int $id
 * @property string|null $name
 */
class DoctorType extends \soft\db\ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function labels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Doktor turi nomi'),
        ];
    }

    //</editor-fold>

    public static function map()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
