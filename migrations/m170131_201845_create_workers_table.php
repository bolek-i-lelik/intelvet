<?php

use yii\db\Migration;

/**
 * Handles the creation of table `workers`.
 */
class m170131_201845_create_workers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%workers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Имя сотрудника'),
            'familie' => $this->string()->notNull()->comment('Фамилия сотрудника'),
            'father' => $this->string()->notNull()->comment('Отчество сотрудника'),
            'specification' => $this->string()->notNull()->comment('Должность сотрудника'),
            'parent' => $this->integer(8)->notNull()->comment('ID родительского класса'),
            'user_id' => $this->integer(8)->notNull()->comment('ID пользователя - таблица User'),
            'phone' => $this->string(20)->comment('Номер телефона сотрудника'),
            'email' => $this->string()->notNull()->comment('email'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%workers}}');
    }
}
