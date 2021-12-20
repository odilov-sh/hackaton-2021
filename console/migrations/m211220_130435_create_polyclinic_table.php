<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%polyclinic}}`.
 */
class m211220_130435_create_polyclinic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%polyclinic}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'region_id' => $this->integer(),
            'district_id' => $this->integer(),
            'address' => $this->string(),
            'map' => $this->text(),
        ]);

        $this->addColumn('{{%user}}', 'polyclinic_id', $this->integer());

        $this->addForeignKey('fk_user_polyclinic_id_relation','{{%user}}','polyclinic_id','{{%polyclinic}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_polyclinic_id_relation','{{%user}}');
        $this->dropColumn('{{%user}}','polyclinic_id');
        $this->dropTable('{{%polyclinic}}');
    }
}
