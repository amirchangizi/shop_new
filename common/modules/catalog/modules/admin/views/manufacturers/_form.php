<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Manufacturers */
/* @var $form yii\widgets\ActiveForm */

$this->title = ($model->isNewRecord) ? Yii::t('app', 'Create Manufacturer') : Yii::t('app', 'Update Manufacturer');

echo Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Manufacturer',
            'url' => ['/catalog/admin/manufacturers'],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],

        $this->title,
    ],
]);

$labels = $model->attributeLabels();

?>


<div class="row">
    <div class="col-sm-12">
        <div class="widget-box">

            <?php $form = ActiveForm::begin([
                'id' => Yii::$app->controller->id . '-form',
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php echo ($model->isNewRecord) ? Yii::t('app', 'Create Manufacturer') : Yii::t('app', 'Update Manufacturer') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>', ($model->isNewRecord) ? [Yii::$app->controller->id . '/create'] : [Yii::$app->controller->id . '/update', 'id' => $model->manufacturers_id], [
                        'data' => [
                            'method' => 'post',
                        ]
                    ]) ?>

                    <a href="<?= Url::to(['/catalog/admin/manufacturers']) ?>">
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['manufacturers_name'] ?></label>
                        <div
                            class="col-sm-4 "><?= $form->field($model, 'manufacturers_name')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['manufacturers_url'] ?></label>
                        <div
                            class="col-sm-4 "><?= $form->field($model, 'manufacturers_url')->textInput(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['manufacturers_image'] ?></label>
                        <div
                            class="col-sm-4 "><?= $form->field($model, 'imageFile')->fileInput([])->label(false) ?></div>
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 "></div>
                    </div>

                </div>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>

