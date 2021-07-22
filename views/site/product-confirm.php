<?php

declare(strict_types=1);

use yii\helpers\Html;

$this->title = 'Product';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>Продукт <?= Html::encode($product->productName)?> успешно добавлен</p>
