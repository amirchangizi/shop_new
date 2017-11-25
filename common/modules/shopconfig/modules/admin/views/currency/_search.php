<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\CurrencySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currency-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'currency_id') ?>

    <?= $form->field($model, 'currency_title') ?>

    <?= $form->field($model, 'currency_name') ?>

    <?= $form->field($model, 'currency_value') ?>

    <?= $form->field($model, 'currency_min') ?>

    <?php // echo $form->field($model, 'currency_max') ?>

    <?php // echo $form->field($model, 'currency_last_update') ?>

    <?php // echo $form->field($model, 'is_default') ?>

    <?php // echo $form->field($model, 'currency_symbol') ?>

    <?php // echo $form->field($model, 'currency_possition') ?>

    <?php // echo $form->field($model, 'decimal_placement') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
