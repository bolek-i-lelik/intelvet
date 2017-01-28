<?php

use yii\db\Migration;

/**
 * Handles adding position to table `users`.
 */
class m170126_221538_add_position_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%users}}', 'street', $this->string());
        $this->addColumn('{{%users}}', 'house', $this->integer(5));
        $this->addColumn('{{%users}}', 'korpus', $this->integer(3));
        $this->addColumn('{{%users}}', 'raion', $this->string());
        $this->addColumn('{{%users}}', 'nas_punkt', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
