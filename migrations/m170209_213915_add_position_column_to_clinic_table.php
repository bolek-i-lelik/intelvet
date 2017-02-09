<?php

use yii\db\Migration;

/**
 * Handles adding position to table `clinic`.
 */
class m170209_213915_add_position_column_to_clinic_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
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
            '{{%user}}',
            'id',
            'CASCADE'
        ); 
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
