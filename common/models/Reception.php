<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reception".
 *
 * @property int $id
 * @property int|null $client_id Bemor
 * @property float|null $weight Og'irligi
 * @property float|null $fever Isitmasi
 * @property float|null $height Bo'yi
 * @property string|null $blood_pressure Qon bosimi
 * @property string|null $complaint Bemor shikoyati
 * @property string|null $analiz_result Analiz natijalari
 * @property string|null $diagnos Tashxis
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $client
 * @property User $createdBy0
 * @property User $updatedBy0
 */
class Reception extends \soft\db\ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
    * {@inheritdoc}
    */
    public static function tableName()
    {
        return 'reception';
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
            [['client_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['weight', 'fever', 'height'], 'number'],
            [['complaint', 'analiz_result', 'diagnos'], 'string'],
            [['blood_pressure'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
    * {@inheritdoc}
    */
    public function labels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_id' => Yii::t('app', 'Bemor'),
            'weight' => Yii::t('app', 'Og\'irligi'),
            'fever' => Yii::t('app', 'Isitma'),
            'height' => Yii::t('app', 'Balandligi'),
            'blood_pressure' => Yii::t('app', 'Qon bosimi'),
            'complaint' => Yii::t('app', 'Shikoyat'),
            'analiz_result' => Yii::t('app', 'Analiz natijasi'),
            'diagnos' => Yii::t('app', 'Tashxis'),
        ];
    }
    //</editor-fold>

    //<editor-fold desc="Relations" defaultstate="collapsed">
    
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getClient()
    {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }
    
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
    //</editor-fold>
}
