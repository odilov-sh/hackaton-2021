<?php
/*
 * @author Shukurullo Odilov
 * @link telegram: https://t.me/yii2_dasturchi
 * @date 13.07.2021, 15:18
 */

namespace backend\modules\regionmanager\models;

use backend\modules\usermanager\models\User;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property int $region_id
 * @property string|null $name_uz
 * @property string|null $name_oz
 * @property string|null $name_ru
 *
 * @property Region $region
 * @property-read null|string $name
 * @property Quarter[] $quarters
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name_uz', 'name_oz', 'name_ru'], 'string', 'max' => 100],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'name_uz' => 'Nomi',
            'name_oz' => 'Name Oz',
            'name_ru' => 'Name Ru',
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[Quarters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuarters()
    {
        return $this->hasMany(Quarter::className(), ['district_id' => 'id']);
    }

    public function getName()
    {
        return $this->name_uz;
    }

    /**
     * @param $region_id
     * @return array
     */
    public static function mapByRegionId($region_id)
    {
        if (empty($region_id)) {
            return [];
        }

        return map(static::find()->andWhere(['region_id' => $region_id])->all(), 'id', 'name');
    }

    public function getDistrictClientCount()
    {
        $count = User::find()
            ->andWhere(['district_id' => $this->id])
            ->andWhere(['type_id' => User::TYPE_CLIENT])
            ->count();

        return $count;
    }
}
