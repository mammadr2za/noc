<?php

namespace app\controllers;

use Yii;
use app\models\Service;
use app\models\Servicetype;
use app\models\Usermanagement;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

class ServiceController extends Controller
{
    public function actionCreate()
    {
        $service = new Service();
        if ($service->load(Yii::$app->request->post()) && $service->validate()) {
            if ($service->save()) {
                Yii::$app->session->setFlash('success', 'اطلاعات با موفقیت ثبت شد');
                return $this->redirect('/service/show');
            }
        }
        return $this->render('form', [
            'service' => $service,
            'usermanagement' => $service-> getUsermanagement(),     
            'list' => $service->getNameAndTypeList(),
        ]);
    }
    public function actionUpdate($id)
    {
        $service = Service::findOne($id);
        if ($service->load(Yii::$app->request->post())) {
            if ($service->validate() && $service->save()) {
                Yii::$app->session->setFlash('message', 'Update successfully');
                return $this->redirect(['/service/show']);
            }
        }
        return $this->render('update', [
            'service' => $service
        ]);
    }
    public function actionDelete($id)
    {
        $service = Service::findOne($id);
        if ($service !== null) {
            $service->delete();
        }
        return $this->redirect(['/service/show']);
    }

    public function actionShow()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

}