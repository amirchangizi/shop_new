<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\TaxratesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-rates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tax_rates_id') ?>

    <?= $form->field($model, 'tax_zone_id') ?>

    <?= $form->field($model, 'tax_class_id') ?>

    <?= $form->field($model, 'tax_priority') ?>

    <?= $form->field($model, 'tax_rate') ?>

    <?php // echo $form->field($model, 'tax_description') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'date_added') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
