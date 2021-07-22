<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($product, 'productName')->label('Наименование') ?>
<?= $form->field($product, 'sku')->label('SKU') ?>
<?= $form->field($product, 'quantity')->label('Остаток на складе') ?>
<?= $form->field($product, 'productType')->label('Тип товара') ?>
<?= $form->field($product, 'imageUrl')->label('URL') ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', [ 'class' => 'btn btn-primary' ]) ?>
</div>

<?php ActiveForm::end(); ?>