<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\ManufacturersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufacturers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'manufacturers_id') ?>

    <?= $form->field($model, 'manufacturers_name') ?>

    <?= $form->field($model, 'manufacturers_url') ?>

    <?= $form->field($model, 'manufacturers_image') ?>

    <?= $form->field($model, 'date_added') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
