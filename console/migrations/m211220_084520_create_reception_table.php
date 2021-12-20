<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%reception}}`.
 */
class m211220_084520_create_reception_table extends Migration
{

    public $tableName = 'reception';

    public $blameable = true;

    public $timestamp = true;

    public $foreignKeys = [
        [
            'columns' => 'client_id',
            'refTable' => 'user',
        ]
    ];

    public function attributes()
    {
        return [

            'client_id' => $this->integer()->comment('Bemor'),
            'weight' => $this->double()->comment("Og'irligi"),
            'fever' => $this->double()->comment('Isitmasi'),
            'height' => $this->double()->comment("Bo'yi"),
            'blood_pressure' => $this->string()->comment("Qon bosimi"),
            'complaint' => $this->text()->comment("Bemor shikoyati"),
            'analiz_result' => $this->text()->comment('Analiz natijalari'),
            'diagnos' => $this->text()->comment('Tashxis'),

        ];
    }

}
