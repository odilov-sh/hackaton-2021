<?php
/*
 * @author Shukurullo Odilov
 * @link telegram: https://t.me/yii2_dasturchi
 * @date 13.07.2021, 15:18
 */

namespace backend\modules\regionmanager\models;

use backend\modules\usermanager\models\User;
use common\models\Client;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_oz
 * @property string|null $name_ru
 *
 * @property-read null|string $name
 * @property District[] $districts
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_oz', 'name_ru'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Nomi',
            'name_oz' => 'Name Oz',
            'name_ru' => 'Name Ru',
        ];
    }

    /**
     * Gets query for [[Districts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['region_id' => 'id']);
    }

    /**
     * Get name of region.
     * @return string|null
     */
    public function getName()
    {
//        if (\Yii::$app->language == 'ru'){
//            return '';
//        }
        return $this->name_uz;
    }

    public static function map()
    {
        return map(static::find()->all(), 'id', 'name');
    }

    public function getRegionClientCount()
    {
        $count = User::find()
            ->andWhere(['region_id' => $this->id])
            ->andWhere(['type_id' => User::TYPE_CLIENT])
            ->count();

        return $count;
    }
}
