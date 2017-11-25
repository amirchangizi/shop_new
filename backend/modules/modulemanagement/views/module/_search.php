<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\modulemanagement\models\ModulesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modules-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'module_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'module_name') ?>

    <?= $form->field($model, 'module_path') ?>

    <?= $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'core') ?>

    <?php // echo $form->field($model, 'client') ?>

    <?php // echo $form->field($model, 'config') ?>

    <?php // echo $form->field($model, 'ordering') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'checked_out') ?>

    <?php // echo $form->field($model, 'checked_out_time') ?>

    <?php // echo $form->field($model, 'publish_up') ?>

    <?php // echo $form->field($model, 'publish_down') ?>

    <?php // echo $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'access') ?>

    <?php // echo $form->field($model, 'showtitle') ?>

    <?php // echo $form->field($model, 'params') ?>

    <?php // echo $form->field($model, 'added_user') ?>

    <?php // echo $form->field($model, 'date_added') ?>

    <?php // echo $form->field($model, 'modified_user') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'language_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
