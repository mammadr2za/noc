<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\Pop_Point;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class Servicetype extends ActiveRecord
{
    public function rules(): array
    {
        return [
            [['name', 'type', 'name_pop_point'], 'required'],
            [['name', 'type'], 'string'],
        ];
    }
    public static function tableName(): string
    {
        return "servicetype";
    }
    public function getPopPointDropDown(): array
    {
        return ArrayHelper::map(Pop_Point::find()->all(), 'name', 'name');
    }
    public function getPop()
    {
        return ArrayHelper::map(Pop_Point::find()->where(['type' => 'pop'])->all(), 'id', 'name');
    }
    public function getPop_Point()
    {
        return $this->hasOne(Pop_Point::class, ['name' => 'name_pop_point']);
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            $pop = Pop_Point::findOne(['name' => $this->name_pop_point]);

            if ($pop) {

                $textValue = $pop->is_used ? 'ست شده' : 'ست نشده';

                $pop->is_used = $textValue;

                $pop->save();

            }

        }

    }
}