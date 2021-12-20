<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_doctor_type_id_column_user}}`.
 */
class m211220_094809_create_add_doctor_type_id_column_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'doctor_type_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}','doctor_type_id');
    }
}
