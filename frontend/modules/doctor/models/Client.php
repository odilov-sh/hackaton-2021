<?php

namespace frontend\modules\doctor\models;

use PhpOffice\PhpWord\TemplateProcessor;
use yii\helpers\FileHelper;
use common\models\User;
use soft\helpers\ArrayHelper;
use Yii;

class Client extends User
{
    public $receptions;

    const SCENARIO_DOCTOR_FORM = 'doctorForm';

    public function rules()
    {
        return [
            [['firstname', 'passport', 'date_of_birth'], 'required'],
            [['firstname', 'lastname', 'middlename', 'passport', 'street', 'house_number', 'phone',], 'string'],
            [['region_id', 'district_id', 'quarter_id', 'gender_id'], 'integer'],
            ['date_of_birth', 'safe'],
        ];
    }

    public static function find()
    {
        return parent::find()->client();
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios [self::SCENARIO_DOCTOR_FORM] = [
            'lastname', 'firstname', 'middlename',
            'region_id', 'district_id', 'quarter_id',
            'street', 'house_number', 'phone',
            'passport', 'date_of_birth', 'gender_id'
        ];
        return $scenarios;
    }
    public function getWordView($receptions)
    {
        $this->receptions = $receptions;
        return Yii::$app->htmlToDoc->getHeader() . $this->getWordContent($this->receptions) . Yii::$app->htmlToDoc->getFooter();
    }

    public function getWordTemplateFile()
    {
        return '@common/word_templates/client.php';
    }

    public function getWordContent($receptions)
    {
        return Yii::$app->controller->renderPartial($this->getWordTemplateFile(), ['client' => $this, 'receptions' => $receptions]);
    }

    public function downloadWord($receptions)
    {
        $file = $this->getWordContent($receptions);
        return Yii::$app->htmlToDoc->createDoc($file, '№ ' . $this->firstname, true);
    }
}
