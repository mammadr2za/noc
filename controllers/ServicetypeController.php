<?php

namespace app\controllers;

use Yii;
use app\models\Servicetype;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\Pop_Point;
use yii\helpers\ArrayHelper;

class ServicetypeController extends Controller
{
    public function actionCreate()
    {
        $servicetype = new Servicetype();
        if ($servicetype->load(Yii::$app->request->post()) && $servicetype->validate()) {
            $servicetype->name_pop_point = implode('_', $servicetype->getAttribute('name_pop_point'));
            if ($servicetype->save()) {

                Yii::$app->session->setFlash('success', 'اطلاعات با موفقیت ثبت شد');
                return $this->redirect('/servicetype/show');
            }
        }
        return $this->render('form', [
            'servicetype' => $servicetype,
            'popPointDropDown' => $servicetype->getPopPointDropDown(),
        ]);
    }
    public function actionPop()
    {
        $popPoints = Pop_Point::find()->where(['type' => 'pop'])->all();
        $popPointDropDown = ArrayHelper::map($popPoints, 'name', 'name');
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        return $popPointDropDown;
    }
    public function actionPoint()
    {
        $popPoints = Pop_Point::find()->where(['type' => 'point'])->all();
        $popPointDropDown = ArrayHelper::map($popPoints, 'name', 'name');
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        return $popPointDropDown;
    }
    public function actionView($id)
    {
        $servicetype = Servicetype::findOne($id);
        if ($servicetype->load(Yii::$app->request->post())) {
            if ($servicetype->validate() && $servicetype->Back()) {
                Yii::$app->session->setFlash('');
                return $this->redirect(['/servicetype/show']);
            }
        }
        return $this->render('view', [
            'servicetype' => $servicetype,
            'popPointDropDown' => $servicetype->getPopPointDropDown(),
            'backUrl' => Yii::$app->request->referrer
        ]);
    }
    // actionUpdate
    public function actionUpdate($id)
    {
        $servicetype = Servicetype::findOne($id);
        $selectedValues = Yii::$app->request->post('servicetype')['name_pop_point'] ?? $servicetype->name_pop_point;
        if ($servicetype->load(Yii::$app->request->post())) {
            $servicetype->name_pop_point = implode('---', $servicetype->name_pop_point);
            if ($servicetype->validate() && $servicetype->save()) {
                Yii::$app->session->setFlash('message', 'Update successfully');
                return $this->redirect(['/servicetype/show']);
            }
        }
        $popPointDropDown = $servicetype->getPopPointDropDown();
        $selectedValues = explode('_', $selectedValues);
        $popPoints = array_keys($popPointDropDown);
        $popPointsSelected = array_intersect($popPoints, $selectedValues);
        return $this->render('update', [
            'servicetype' => $servicetype,
            'popPointDropDown' => $popPointDropDown,
            'popPointsSelected' => $popPointsSelected
        ]);
    }
    public function actionDelete($id)
    {
        $servicetype = Servicetype::findOne($id);

        // بررسی استفاده شدن رکورد
        if ($servicetype->pop_Point && $servicetype->pop_Point->is_used) {

            // نمایش پیغام خطا
            Yii::$app->session->setFlash('error', 'این رکورد قابل حذف نیست زیرا از آن استفاده شده است.');

            return $this->redirect(['/servicetype/show']);
        }

        // حذف رکورد
        $servicetype->delete();

        return $this->redirect(['/servicetype/show']);

    }

    public function actionShow()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Servicetype::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

}