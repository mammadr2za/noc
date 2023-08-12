<?php

namespace app\controllers;

use Yii;
use app\models\Pop_Point;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class PopController extends Controller
{
    public function actionCreate()
    {
        $pop = new Pop_Point();
        if ($pop->load(Yii::$app->request->post()) && $pop->validate()) {
            if ($pop->save()) {
                Yii::$app->session->setFlash('success', 'اطلاعات با موفقیت ثبت شد');
                return $this->redirect('/pop/show');
            }
        }
        return $this->render('form', [
            'pop' => $pop
        ]);
    }
    public function actionUpdate($id)
    {
        $pop = Pop_Point::findOne($id);
        if ($pop->load(Yii::$app->request->post())) {
            if ($pop->validate() && $pop->save()) {
                Yii::$app->session->setFlash('message', 'Update successfully');
                return $this->redirect(['/pop/show']); 
            }
        }
        return $this->render('update', ['pop' => $pop]);
    }
    public function actionDelete($id)
    {
        $Pop = Pop_Point::findOne($id);
        if ($Pop !== null) {
            $Pop->delete();
        }
        return $this->redirect(['/pop/show']);
    }
    public function actionShow()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pop_Point::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }
}