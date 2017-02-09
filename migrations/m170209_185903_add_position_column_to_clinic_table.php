<?php

use yii\db\Migration;

/**
 * Handles adding position to table `clinic`.
 */
class m170209_185903_add_position_column_to_clinic_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%clinic}}', 'user_id', $this->integer()->notNull());
    
        // creates index for column `user_id`
        $this->createIndex(
            'idx-clinic-user_id',
            '{{%clinic}}',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-clinic-user_id',
            '{{%clinic}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );  

    }  

    /**
     * @inheritdoc
     */
    public function down()
    {

        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-clinic-user_id',
            '{{%clinic}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-clinic-user_id',
            '{{%clinic}}'
        );

    }
}
