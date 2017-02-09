<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clinic`.
 */
class m170209_185002_create_clinic_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%clinic}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'adress' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'avatar' => $this->string(),
            'email' => $this->string(),
            'site' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%clinic}}');
    }
}
