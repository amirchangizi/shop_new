<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\ZonesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'zone_id') ?>

    <?= $form->field($model, 'zone_country_id') ?>

    <?= $form->field($model, 'zone_code') ?>

    <?= $form->field($model, 'zone_name') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
