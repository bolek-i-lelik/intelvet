<?php

use yii\db\Migration;

/**
 * Handles the creation of table `adress`.
 */
class m170131_201047_create_adress_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%adress}}', [
            'id' => $this->primaryKey(),
            'index' => $this->integer(6)->comment('Почтовый индекс'),
            'city' => $this->string()->comment('Город'),
            'region' => $this->string()->comment('Регион'),
            'street' => $this->string()->comment('Улица'),
            'house' => $this->string(8)->comment('Номер дома'),
            'korpus' => $this->string(8)->comment('Строение/корпус'),
            'name' => $this->string()->comment('Название клиники/филиала'),
            'phone' => $this->string(20)->comment('Номер телефона'),
            'email' => $this->string()->comment('email'),
            'parent' => $this->integer()->notNull()->comment('ID родительской клиники'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%adress}}');
    }
}
