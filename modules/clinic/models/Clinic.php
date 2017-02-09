<?php

namespace app\modules\clinic\models;

use Yii;

/**
 * This is the model class for table "clinic".
 *
 * @property integer $id
 * @property string $name
 * @property string $adress
 * @property string $phone
 * @property string $avatar
 * @property string $email
 * @property string $site
 * @property integer $user_id
 *
 * @property Users $user
 */
class Clinic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clinic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adress', 'phone', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            ['email', 'email'],
            [['name', 'adress', 'phone', 'avatar', 'email', 'site'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \dektrium\user\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'adress' => 'Adress',
            'phone' => 'Phone',
            'avatar' => 'Avatar',
            'email' => 'Email',
            'site' => 'Site',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\dektrium\user\models\User::className(), ['id' => 'user_id']);
    }
}
