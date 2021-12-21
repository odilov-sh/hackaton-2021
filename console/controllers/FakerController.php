<?php


namespace console\controllers;

use common\models\User;
use Faker\Factory;

class FakerController extends \yii\console\Controller
{

    public function actionDoctor()
    {

        $pols = \backend\models\Polyclinic::getAll();
        $dtypes = \backend\models\DoctorType::getAll();

        $factory = $this->factoryEn();

        foreach ($pols as $pol){

            foreach ($dtypes as $dtype){

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

                if (!$doctor->save()){
                    print_r($doctor->errors);
                    die();
                }

            }

        }

        echo "\n Success \n";


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

    public function arrayRand($array = [])
    {
        $key = array_rand($array);
        return $array[$key];
    }

    //</editor-fold>

}
