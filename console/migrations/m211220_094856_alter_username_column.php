<?php

use yii\db\Migration;

/**
 * Class m211220_094856_alter_username_column
 */
class m211220_094856_alter_username_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'username', $this->string());
        $this->alterColumn('user', 'password_hash', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211220_094856_alter_username_column cannot be reverted.\n";

        return false;
    }
    */
}
