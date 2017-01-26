<?php

use yii\db\Migration;

/**
 * Handles adding position to table `users`.
 */
class m170126_215946_add_position_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%users}}', 'password', $this->string(32)->notNull());
        $this->addColumn('{{%users}}', 'auth_key', $this->string()->notNull());
        $this->addColumn('{{%users}}', 'access_token', $this->string(32)->notNull());
        $this->addColumn('{{%users}}', 'father', $this->string());
        $this->addColumn('{{%users}}', 'familie', $this->string());
        $this->addColumn('{{%users}}', 'age', $this->integer(3));
        $this->addColumn('{{%users}}', 'phone', $this->integer(11));
        $this->addColumn('{{%users}}', 'type', $this->integer(1));
        $this->addColumn('{{%users}}', 'created_at', $this->integer()->notNull());
        $this->addColumn('{{%users}}', 'updated_at', $this->timestamp());
        $this->addColumn('{{%users}}', 'post_index', $this->integer(6));
        $this->addColumn('{{%users}}', 'city', $this->string());
        $this->addColumn('{{%users}}', 'region', $this->integer(3));
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
