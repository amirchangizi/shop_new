<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\OptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="option-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'option_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'sort_order') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'language_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
