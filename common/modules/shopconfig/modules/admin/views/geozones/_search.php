<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\GeozonesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="geo-zones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'geo_zone_id') ?>

    <?= $form->field($model, 'geo_zone_name') ?>

    <?= $form->field($model, 'geo_zone_description') ?>

    <?= $form->field($model, 'last_modified') ?>

    <?= $form->field($model, 'date_added') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
