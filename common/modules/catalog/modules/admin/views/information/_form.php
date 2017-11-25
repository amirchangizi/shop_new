<?php

use common\helpers\LanguageHelper;
use common\models\enums\ActivateStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Information */
/* @var $form yii\widgets\ActiveForm */


$this->title = ($model->isNewRecord) ? Yii::t('app','Create information') : Yii::t('app','Update information') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'information',
            'url' => ['/catalog/admin/information'],
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
                'enableClientValidation' => false,
                'enableAjaxValidation' => true,
                'validateOnChange' => true,
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create information') : Yii::t('app','Update information') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->information_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/catalog/admin/information'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['title'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'title')->textInput( ['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['status'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'status')->dropDownList(ActivateStatus::$list)->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['bottom'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'bottom')->checkbox()->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'language_id')->dropDownList(LanguageHelper::getByValue())->label(false) ?></div>

                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['description'] ?></label>
                        <div class="col-sm-10 "><?= $form->field($model, 'description')->textarea()->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['meta_description'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'meta_description')->textarea()->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['meta_keyword'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'meta_keyword')->textarea()->label(false) ?></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>

