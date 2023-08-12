<?php
namespace app\models;


use yii\db\ActiveRecord;
use dektrium\user\models\User as BaseUser;

class Usermanagement extends ActiveRecord
{


    public function rules()
    {
        return [
            [['name', 'family', 'address', 'email', 'number'], 'required'],
            [['name', 'family', 'address', 'email'], 'string'],
            [['number'], 'integer']
        ];

    }
    public static function tableName()
    {
        return "User";
    }
    public static function findByname($name)
    {
    return static::findOne(['name' => $name]);
    }
}