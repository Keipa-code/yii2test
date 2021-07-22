<?php

namespace app\controllers;

use app\models\Product;
use Couchbase\SearchQuery;
use Faker\Factory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\data\Sort;
use yii\db\ActiveQuery;
use yii\web\Controller;

class ProductController extends Controller
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
        $params = Yii::$app->request->get();
        $sort = new Sort([
            'attributes' => [
                'product_name' => ['label' => 'Наименование'],
                'sku' => ['label' => 'SKU'],
                'quantity' => ['label' => 'Количество на складе'],
                'product_type' => ['label' => 'Тип продукта'],
            ],
        ]);
        var_dump($params);
        if (isset($params['search'])) {
            $query = Product::find()->orderBy($sort->orders)
                ->where(['like', 'product_name', $params['search']])
                ->orWhere(['like', 'sku', $params['search']]);
        } else {
            $query = Product::find()->orderBy($sort->orders);
        }
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 5,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'productList' => $models,
            'pages' => $pages,
            'sort' => $sort,
            'search' => $params['search'] ?? '',
        ]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionGenerate()
    {

        $faker = Factory::create('ru_RU');
        for($i = 0; $i<1000;$i++) {
            $model = new Product();
            $data = [
                'product_name' => $faker->word,
                'sku' => $faker->postcode,
                'quantity' => $faker->numberBetween(1, 50),
                'product_type' => $faker->word,
                'image_url' => $faker->imageUrl,
            ];
            $model->attributes = $data;
            $model->save();
        }
        return $this->render('update');
    }
}
