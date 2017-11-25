<?php

use common\helpers\TaxHelper;
use common\helpers\ZoneHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\TaxRates */
/* @var $form yii\widgets\ActiveForm */

$this->title = ($model->isNewRecord) ? Yii::t('app','Create Tax Rates') : Yii::t('app','Update Tax Rates') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Tax Rateses',
            'url' => ['/shopconfig/admin/taxrates'],
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
                'id'=>Yii::$app->controller->id.'-form',
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Tax Rates') : Yii::t('app','Update Tax Rates') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->tax_rates_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shopconfig/admin/taxrates'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['tax_zone_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'tax_zone_id')->dropDownList( ZoneHelper::getByValue() ,['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['tax_class_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'tax_class_id')->dropDownList(TaxHelper::getByValue() ,['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['tax_priority'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'tax_priority')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['tax_rate'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'tax_rate')->textInput(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['tax_description'] ?></label>
                        <div class="col-sm-10 "><?= $form->field($model, 'tax_description')->textarea(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>
