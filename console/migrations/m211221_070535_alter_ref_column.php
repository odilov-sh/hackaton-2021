<?php

use yii\db\Migration;

/**
 * Class m211221_070535_alter_ref_column
 */
class m211221_070535_alter_ref_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('reception', 'reference', $this->text());
    }


}
