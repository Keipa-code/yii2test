<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $productList[] app\models\Product */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
</p>

    <table class="table table-condensed">
        <tr>
            <td></td>
            <td>Наименование</td>
            <td>SKU</td>
            <td class="vardo">Количество на складе</td>
            <td>Тип продукта</td>
            <td>Изображение</td>
        </tr>
        <?php foreach ($productList as $product): ?>
            <tr>
                <td><?= $product->product_name; ?></td>
                <td><?= $product->sku; ?></td>
                <td class="vardo"><?= $product->quantity; ?></td>
                <td><?= $product->product_type; ?></td>
                <td><?= $product->image_url; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
