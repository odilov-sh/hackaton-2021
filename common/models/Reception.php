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
            'client_id' => Yii::t('app', 'Client ID'),
            'weight' => Yii::t('app', 'Weight'),
            'fever' => Yii::t('app', 'Fever'),
            'height' => Yii::t('app', 'Height'),
            'blood_pressure' => Yii::t('app', 'Blood Pressure'),
            'complaint' => Yii::t('app', 'Complaint'),
            'analiz_result' => Yii::t('app', 'Analiz Result'),
            'diagnos' => Yii::t('app', 'Diagnos'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
    
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
    //</editor-fold>
}
