<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\Servicetype;
use app\models\Usermanagement;
use yii\helpers\ArrayHelper;

class Service extends ActiveRecord
{
    public function rules(): array
    {
        return [
            [['user_name', 'service_type'], 'required'],
            [['user_name', 'service_type'], 'string'],
        ];
    }
    public static function tableName(): string
    {
        return "service";
    }
    public function getUsermanagement(): array
    {
        return ArrayHelper::map(Usermanagement::find()->all(), 'name', 'name');
    }
      public function getNameAndTypeList() {
        return ArrayHelper::map(
            Servicetype::find()->all(), 
          'name',
          function($service) {
            return $service->name . ' _ ' . $service->type; 
          }
        );
      }
}
