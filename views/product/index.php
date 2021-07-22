<?php

use app\widgets\SearchWidget;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $productList [] app\models\Product */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <form action="<?= Url::to(['product/index']); ?>" method="get">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Поиск по каталогу" value="<?= $search ?>">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </div>

    </form>
    <form>
    <table class="table table-condensed">
        <tr>
            <td><?php echo $sort->link('product_name'); ?></td>
            <td><?php echo $sort->link('sku'); ?></td>
            <td class="vardo"><?php echo $sort->link('quantity'); ?></td>
            <td><?php echo $sort->link('product_type'); ?></td>
            <td>Изображение</td>
        </tr>
        <?php foreach ($productList as $product): ?>
            <tr>
                <td><?= $product->product_name; ?></td>
                <td><?= $product->sku; ?></td>
                <td class="vardo"><?= $product->quantity; ?></td>
                <td><?= $product->product_type; ?></td>
                <td class="product-image"><img class="modal-hover-opacity" src="<?= $product->image_url; ?>" alt="image"
                                               onclick="onClick(this)"></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </form>
    <?php echo LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
    <div id="modal01" class="modal" onclick="this.style.display='none'">
        <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <div class="modal-content">
            <img id="img01" style="max-width:100%">
        </div>
    </div>
</div>
