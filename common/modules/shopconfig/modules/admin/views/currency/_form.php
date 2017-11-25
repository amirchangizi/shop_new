<?php

use common\models\enums\ConfirmStatus;
use common\models\enums\RtlStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\Currency */
/* @var $form yii\widgets\ActiveForm */

$this->title = ($model->isNewRecord) ? Yii::t('app','Create Currency') : Yii::t('app','Update Currency') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Currency',
            'url' => ['/shopconfig/admin/currency'],
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
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Currency') : Yii::t('app','Update Currency') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->currency_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shopconfig/admin/currency'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['currency_title'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'currency_title')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['currency_name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'currency_name')->textInput(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['currency_value'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'currency_value')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['is_default'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'is_default')->dropDownList(ConfirmStatus::$list)->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['currency_min'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'currency_min')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['currency_max'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'currency_max')->textInput(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['currency_symbol'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'currency_symbol')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['currency_possition'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'currency_possition')->dropDownList(RtlStatus::listData())->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['decimal_placement'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'decimal_placement')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 "></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>

