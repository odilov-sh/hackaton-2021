<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_column_User}}`.
 */
class m211220_084147_create_add_column_User_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'middlename', $this->string());
        $this->addColumn('{{%user}}', 'region_id', $this->integer());
        $this->addColumn('{{%user}}', 'district_id', $this->integer());
        $this->addColumn('{{%user}}', 'quarter_id', $this->integer());
        $this->addColumn('{{%user}}', 'street', $this->string());
        $this->addColumn('{{%user}}', 'house_number', $this->string());
        $this->addColumn('{{%user}}', 'phone', $this->string());
        $this->addColumn('{{%user}}', 'passport', $this->string());
        $this->addColumn('{{%user}}', 'date_of_birth', $this->integer());
        $this->addColumn('{{%user}}', 'gender_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('{{%user}}','gender_id');
        $this->dropColumn('{{%user}}','date_of_birth');
        $this->dropColumn('{{%user}}','passport');
        $this->dropColumn('{{%user}}','phone');
        $this->dropColumn('{{%user}}','house_number');
        $this->dropColumn('{{%user}}','street');
        $this->dropColumn('{{%user}}','quarter_id');
        $this->dropColumn('{{%user}}','district_id');
        $this->dropColumn('{{%user}}','region_id');
        $this->dropColumn('{{%user}}','middlename');
    }
}
