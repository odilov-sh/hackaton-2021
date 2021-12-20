<?php

namespace backend\models;

use backend\modules\regionmanager\models\District;
use backend\modules\regionmanager\models\Region;
use soft\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "polyclinic".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $region_id
 * @property int|null $district_id
 * @property string|null $address
 * @property string|null $map
 *
 * @property User[] $users
 */
class Polyclinic extends \soft\db\ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polyclinic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'district_id'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['map'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function labels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Poliklinika nomi'),
            'region_id' => Yii::t('app', 'Viloyat nomi'),
            'district_id' => Yii::t('app', 'Tuman nomi'),
            'address' => Yii::t('app', 'Manzili'),
            'map' => Yii::t('app', 'Xarita manzili'),
        ];
    }
    //</editor-fold>

    //<editor-fold desc="Relations" defaultstate="collapsed">

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['polyclinic_id' => 'id']);
    }

    public function getRegion()
    {

        return $this->hasOne(Region::class, [
            'id' => 'region_id',
        ]);
    }

    public function getDistrict()
    {
        return $this->hasOne(District::class, [
            'id' => 'district_id'
        ]);
    }

    //</editor-fold>

    public static function map()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
