<?php

namespace console\controllers;

use backend\models\Polyclinic;
use common\models\Reception;
use common\models\User;
use Faker\Factory;
use frontend\modules\doctor\models\Client;

class FakerController extends \yii\console\Controller
{

    public function actionDoctor()
    {

        $pols = Polyclinic::getAll();
        $dtypes = \backend\models\DoctorType::getAll();

        $factory = $this->factoryEn();

        foreach ($pols as $pol) {

            foreach ($dtypes as $dtype) {

                $isMale = $this->arrayRand([true, false]);

                $doctor = new User([
                    'type_id' => User::TYPE_DOCTOR,
                ]);

                $doctor->polyclinic_id = $pol->id;
                $doctor->region_id = $pol->region_id;
                $doctor->district_id = $pol->district_id;
                $doctor->lastname = $factory->lastName;
                $doctor->firstname = $isMale ? $factory->firstNameMale : $factory->firstNameFemale;
                $doctor->gender_id = $isMale ? User::GENDER_MALE : User::GENDER_FEMALE;
                $doctor->doctor_type_id = $dtype->id;
                $doctor->phone = $this->generateUzbPhone();
                $doctor->status = User::STATUS_ACTIVE;

                $doctor->username = strtolower($doctor->firstname);
                $doctor->setPassword($doctor->username);

                if (!$doctor->save()) {
                    print_r($doctor->errors);
                    die();
                }
            }
        }

        echo "\n Success \n";

    }

    public function actionClient()
    {

        $pols = Polyclinic::getAll();
        echo "\nStarted\n";

        $factory = $this->factoryEn();

        foreach ($pols as $pol) {

            for ($i = 1; $i <= 100; $i++) {

                $isMale = $this->arrayRand([true, false]);

                $client = new Client([
                    'type_id' => User::TYPE_CLIENT,
                    'scenario' => Client::SCENARIO_DOCTOR_FORM,
                ]);

                $client->polyclinic_id = $pol->id;
                $client->region_id = $pol->region_id;
                $client->district_id = $pol->district_id;
                $client->street = (string)$factory->streetName;
                $client->house_number = (string)random_int(10, 200);
                $client->passport = $this->generatePassportSerial();
                $client->lastname = $factory->lastName;
                $client->firstname = $isMale ? $factory->firstNameMale : $factory->firstNameFemale;
                $client->gender_id = $isMale ? User::GENDER_MALE : User::GENDER_FEMALE;
                $client->phone = $this->generateUzbPhone();
                $client->status = User::STATUS_ACTIVE;
                $client->date_of_birth = $this->genaretDate();

                if (!$client->save(false)) {
                    print_r($client->errors);
                    die();
                } else {
                    echo $client->id . " created!!\n";
                }
            }
        }
    }

    public function actionMiddle()
    {
        $users = User::find()->all();

        $factory = $this->factoryEn();
        foreach ($users as $user) {
            if (empty($user->middlename)) {
                $user->middlename = $factory->firstNameMale;
                $user->save(false);
            }
        }
    }

    public function actionClientRegion()
    {
        $users = User::find()->all();

        foreach ($users as $user) {

            $pol = $user->polyclinic;

            if ($pol) {

                $user->region_id = $pol->region_id;
                $user->district_id = $pol->district_id;
                $user->save(false);
            }

        }
    }

    public function actionReception()
    {

        $clients = Client::find()->all();


        $today = strtotime('today');
        $from = strtotime('-2 months', $today);

        $factory = $this->factoryEn();

        echo "\nstart";

        foreach ($clients as $client) {

            $doctors = User::find()->doctor()->andWhere(['polyclinic_id' => $client->polyclinic_id])->column();


            $count = random_int(2, 5);
            $height = mt_rand(160, 180);
            $weight = mt_rand(60, 80);

            for ($i = 1; $i <= $count; $i++) {

                $doctor_id = $this->arrayRand($doctors);

                $model = new Reception();
                $model->detachBehaviors();
                $model->client_id = $client->id;
                $model->created_at = time();
                $model->updated_at = time();
                $model->created_by = $doctor_id;
                $model->updated_by = $doctor_id;
                $model->fever = $this->arrayRand([36.6, 36.8, 37, 37.2, 37.5, 37.7, 38, 38.5]);
                $model->blood_pressure = '110-130';
                $model->weight = $weight;
                $model->height = $height;
                $model->complaint = $factory->text(500);
                $model->analiz_result = $factory->text(500);
                $model->diagnos = $factory->text(500);
                $model->reference = $factory->text(500);

                $date = random_int($from, $today);

                $model->created_at = $date;
                $model->updated_at = $date;

                if ($model->save()) {
                    echo $model->id . " created \n";
                } else {
                    print_r($model->errors);
                    die();
                }

            }

        }

    }

    //<editor-fold desc="Additional methods" defaultstate="collapsed">

    public function factoryEn()
    {
        return Factory::create('en_US');
    }

    public function factoryRu()
    {
        return Factory::create('ru_RU');
    }

    public function generateUzbPhone()
    {
        $n1 = mt_rand(100, 999);
        $n2 = mt_rand(10, 99);
        $n3 = mt_rand(10, 99);
        $codes = ['90', '91', '93', '94', '95', '97', '99'];
        $key = array_rand($codes);
        $code = $codes[$key];
        return "+998($code) $n1-$n2-$n3";
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function generatePassportSerial()
    {
        $serial = $this->arrayRand(['AA', 'AB', 'AC']);
        $number = random_int(1000000, 9999999);
        return $serial . $number;
    }

    public function genaretDate()
    {
        $year = random_int(1970, 2021);
        $month = random_int(1, 12);
        $maxMonthDay = $month == 2 ? 28 : 30;

        $day = random_int(1, $maxMonthDay);

        return strtotime("$day.$month.$year");
    }

    public function arrayRand($array = [])
    {
        $key = array_rand($array);
        return $array[$key];
    }

    //</editor-fold>

}
