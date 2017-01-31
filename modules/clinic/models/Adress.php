<?php

namespace app\modules\clinic\models;

use Yii;

/**
 * This is the model class for table "adress".
 *
 * @property integer $id
 * @property integer $index
 * @property string $city
 * @property string $region
 * @property string $street
 * @property string $house
 * @property string $korpus
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property integer $parent
 */
class Adress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index', 'parent'], 'integer'],
            [['parent'], 'required'],
            [['city', 'region', 'street', 'name', 'email'], 'string', 'max' => 255],
            [['house', 'korpus'], 'string', 'max' => 8],
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
            'index' => 'Index',
            'city' => 'City',
            'region' => 'Region',
            'street' => 'Street',
            'house' => 'House',
            'korpus' => 'Korpus',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'parent' => 'Parent',
        ];
    }
}
