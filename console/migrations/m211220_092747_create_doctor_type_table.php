<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%doctor_type}}`.
 */
class m211220_092747_create_doctor_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%doctor_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%doctor_type}}');
    }
}
