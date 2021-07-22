<?php
/* @var $this yii\web\View */
/* @var $model app\models\Product */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>product/create</h1>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'product_name') ?>
<?= $form->field($model, 'sku') ?>
<?= $form->field($model, 'quantity') ?>
<?= $form->field($model, 'product_type') ?>
<?= $form->field($model, 'image_url') ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', [ 'class' => 'btn btn-primary' ]) ?>
</div>

<?php ActiveForm::end(); ?>
