<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_bot}}`.
 */
class m211220_181229_create_user_bot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_bot}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string(),
            'first_name' => $this->string(),
            'username' => $this->string(),
            'step' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_bot}}');
    }
}
