<?php

namespace common\models;

use backend\models\Polyclinic;
use backend\modules\regionmanager\models\District;
use backend\modules\regionmanager\models\Quarter;
use backend\modules\regionmanager\models\Region;
use Yii;
use soft\behaviors\TimestampConvertorBehavior;
use common\models\query\UserQuery;
use soft\helpers\ArrayHelper;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property-read string $authKey
 * @property bool $type_id [tinyint(3)]
 * @property string $firstname [varchar(255)]
 * @property string $lastname [varchar(255)]
 * @property string $middlename [varchar(255)]
 * @property int $region_id [int(11)]
 * @property int $district_id [int(11)]
 * @property int $quarter_id [int(11)]
 * @property string $street [varchar(255)]
 * @property string $house_number [varchar(255)]
 * @property string $phone [varchar(255)]
 * @property string $passport [varchar(255)]
 * @property int $date_of_birth [int(11)]
 * @property int $gender_id [int(11)]
 * @property int $doctor_id [int(11)]
 * @property int $doctor_type_id [int(11)]
 * @property int $polyclinic_id [int(11)]
 *
 * @property-read mixed $statusName
 * @property-read string $statusBadge
 * @property-read string $fullname
 *
 * @property-read null|mixed $genderName
 * @property-read bool $isFemale
 * @property-read bool $isClient
 * @property-read bool $isDoctor
 * @property-read bool $isMale
 * @property-read string $typeName
 *
 * @property string $Host [char(60)]
 * @property string $User [char(32)]
 * @property string $Select_priv [enum('N', 'Y')]
 * @property string $Insert_priv [enum('N', 'Y')]
 * @property string $Update_priv [enum('N', 'Y')]
 * @property string $Delete_priv [enum('N', 'Y')]
 * @property string $Create_priv [enum('N', 'Y')]
 * @property string $Drop_priv [enum('N', 'Y')]
 * @property string $Reload_priv [enum('N', 'Y')]
 * @property string $Shutdown_priv [enum('N', 'Y')]
 * @property string $Process_priv [enum('N', 'Y')]
 * @property string $File_priv [enum('N', 'Y')]
 * @property string $Grant_priv [enum('N', 'Y')]
 * @property string $References_priv [enum('N', 'Y')]
 * @property string $Index_priv [enum('N', 'Y')]
 * @property string $Alter_priv [enum('N', 'Y')]
 * @property string $Show_db_priv [enum('N', 'Y')]
 * @property string $Super_priv [enum('N', 'Y')]
 * @property string $Create_tmp_table_priv [enum('N', 'Y')]
 * @property string $Lock_tables_priv [enum('N', 'Y')]
 * @property string $Execute_priv [enum('N', 'Y')]
 * @property string $Repl_slave_priv [enum('N', 'Y')]
 * @property string $Repl_client_priv [enum('N', 'Y')]
 * @property string $Create_view_priv [enum('N', 'Y')]
 * @property string $Show_view_priv [enum('N', 'Y')]
 * @property string $Create_routine_priv [enum('N', 'Y')]
 * @property string $Alter_routine_priv [enum('N', 'Y')]
 * @property string $Create_user_priv [enum('N', 'Y')]
 * @property string $Event_priv [enum('N', 'Y')]
 * @property string $Trigger_priv [enum('N', 'Y')]
 * @property string $Create_tablespace_priv [enum('N', 'Y')]
 * @property string $ssl_type [enum('', 'ANY', 'X509', 'SPECIFIED')]
 * @property string $ssl_cipher [blob]
 * @property string $x509_issuer [blob]
 * @property string $x509_subject [blob]
 * @property int $max_questions [int(11) unsigned]
 * @property int $max_updates [int(11) unsigned]
 * @property int $max_connections [int(11) unsigned]
 * @property int $max_user_connections [int(11) unsigned]
 * @property string $plugin [char(64)]
 * @property string $authentication_string
 * @property string $password_expired [enum('N', 'Y')]
 * @property int $password_last_changed [timestamp]
 * @property int $password_lifetime [smallint(5) unsigned]
 * @property-read Quarter $quarter
 * @property-read Region $region
 * @property-read District $district
 * @property-read string $fio
 * @property-read Polyclinic $polyclinic
 * @property string $account_locked [enum('N', 'Y')]
 *
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const TYPE_ADMIN = 1;
    const TYPE_DOCTOR = 2;
    const TYPE_CLIENT = 3;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    public $password;

    //<editor-fold desc="Parent methods" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'unique', 'message' => 'Ushbu login avvalroq band qilingan.'],
            [['username', 'firstname', 'type_id'], 'required'],
            [['username', 'firstname', 'lastname', 'phone', 'middlename'], 'string', 'max' => 255],

            ['password', 'string', 'min' => 5],
            ['password', 'trim'],

            [['doctor_type_id', 'district_id', 'region_id', 'quarter_id', 'polyclinic_id'], 'integer'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Login',
            'firstname' => 'Ism',
            'lastname' => 'Familiya',
            'middlename' => 'Otasini Ismi',
            'password' => 'Parol',
            'type_id' => 'Xodim turi',
            'typeName' => 'Xodim turi',
            'created_at' => "Yaratildi",
            'updated_at' => "Tahrirlandi",
            'doctor_type_id' => "Doktor turi",
            'phone' => "Telefon raqami",
            'status' => "Holati",
            'region_id' => 'Viloyat',
            'region.name' => 'Viloyat',
            'district_id' => 'Tuman',
            'district.name' => 'Tuman',
            'quarter_id' => 'Hudud',
            'quarter.name' => 'Hudud',
            'date_of_birth' => "Tug'ilgan sanasi",
            'street' => "Ko'cha nomi",
            'house_number' => 'Uy raqami',
            'gender_id' => 'Jinsi',
            'polyclinic_id' => 'Poliklinika nomi',
            'fio' => 'F.I.SH.'
        ];
    }

    /**
     * @return \common\models\query\UserQuery|\yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public static function find()
    {
        return Yii::createObject(UserQuery::class, [get_called_class()]);
    }


    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if (empty($this->auth_key)) {
            $this->generateAuthKey();
        }
        return true;
    }

    //</editor-fold>

    //<editor-fold desc="Required methods" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    //</editor-fold>

    //<editor-fold desc="Status" defaultstate="collapsed">

    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => 'Faol',
            self::STATUS_INACTIVE => 'Nofaol',
        ];
    }

    public function getStatusName()
    {
        return ArrayHelper::getArrayValue(self::statuses(), $this->status);
    }

    public function getStatusBadge(): string
    {
        switch ($this->status) {
            case self::STATUS_ACTIVE:
                return '<span class="badge badge-success">Faol</span>';
            default:
                return '<span class="badge badge-danger">Nofaol</span>';;
        }
    }

    //</editor-fold>

    //<editor-fold desc="Additional" defaultstate="collapsed">

    public function can($permissionName, $params = [])
    {
        return Yii::$app->authManager->checkAccess($this->getId(), $permissionName, $params);
    }

    public function getFullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    //</editor-fold>

    //<editor-fold desc="Type" defaultstate="collapsed">

    public static function types()
    {
        return [
            self::TYPE_ADMIN => 'Admin',
            self::TYPE_DOCTOR => 'Doctor',
            self::TYPE_CLIENT => 'Mijoz',
        ];
    }

    public function getTypeName()
    {
        return ArrayHelper::getArrayValue(self::types(), $this->type_id);
    }

    public function getIsDoctor()
    {
        return $this->type_id == self::TYPE_DOCTOR;
    }

    public function getIsClient()
    {
        return $this->type_id == self::TYPE_CLIENT;
    }

    //</editor-fold>

    //<editor-fold desc="Gender" defaultstate="collapsed">

    /**
     * @return array
     */
    public static function genders()
    {
        return [
            self::GENDER_MALE => "Erkak",
            self::GENDER_FEMALE => "Ayol",
        ];
    }

    /**
     * @return mixed|null
     */
    public function getGenderName()
    {
        return ArrayHelper::getArrayValue(self::genders(), $this->gender_id);
    }

    /**
     * @return bool
     */
    public function getIsMale()
    {
        return $this->gender_id == self::GENDER_MALE;
    }

    /**
     * @return bool
     */
    public function getIsFemale()
    {
        return $this->gender_id == self::GENDER_FEMALE;
    }

    //</editor-fold>

    public function getRegion()
    {

        return $this->hasOne(Region::class, [
            'id' => 'region_id'
        ]);
    }

    public function getDistrict()
    {

        return $this->hasOne(District::class, [
            'id' => 'district_id'
        ]);
    }

    public function getQuarter()
    {

        return $this->hasOne(Quarter::class, [
            'id' => 'quarter_id'
        ]);
    }

    public function getPolyclinic()
    {

        return $this->hasOne(Polyclinic::class, [
            'id' => 'polyclinic_id'
        ]);
    }

    /**
     * @return string
     */
    public function getFio()
    {
        return $this->lastname . ' ' . $this->firstname . ' ' . $this->middlename;
    }
}
