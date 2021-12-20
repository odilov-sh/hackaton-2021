<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%reception}}`.
 */
class m211220_164021_add_reference_column_to_reception_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%reception}}', 'reference', $this->string()->after('created_by'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%reception}}', 'reference');
    }
}
