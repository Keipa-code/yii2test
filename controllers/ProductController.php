<?php

namespace app\controllers;

use app\models\Product;
use Yii;
use yii\data\ActiveDataProvider;

class ProductController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new Product();
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Товар добавлен');
            return $this->redirect(['product/index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            'pagination' => [
                'pageSize' => 20
            ],

        ]);

        //$productList = Product::find()->all();

        return $this->render('index',[
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
