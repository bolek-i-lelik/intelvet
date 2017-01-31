<?php

namespace app\modules\clinic\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property integer $id
 * @property string $name
 * @property string $familie
 * @property string $father
 * @property string $specification
 * @property integer $parent
 * @property integer $user_id
 * @property string $phone
 * @property string $email
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'familie', 'father', 'specification', 'parent', 'user_id', 'email'], 'required'],
            [['parent', 'user_id'], 'integer'],
            [['name', 'familie', 'father', 'specification', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'familie' => 'Familie',
            'father' => 'Father',
            'specification' => 'Specification',
            'parent' => 'Parent',
            'user_id' => 'User ID',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }
}
