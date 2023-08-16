<?php
namespace app\models;

use yii\db\ActiveRecord;

class Pop_Point extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name', 'type'], 'string'],
        ];
    }
    public static function tableName()
    {
        return "pop";
    }
    public function getServicetypes()  
{
  return $this->hasMany(Servicetype::class, ['name_pop_point' => 'name']);
}
}
