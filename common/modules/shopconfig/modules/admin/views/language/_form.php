<?php

use common\models\enums\ActivateStatus;
use common\models\enums\ConfirmStatus;
use common\modules\shopconfig\models\Countries;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\customermanagement\models\CustomerGroup */
/* @var $form yii\widgets\ActiveForm */


$this->title = ($model->isNewRecord) ? Yii::t('app','Create Language') : Yii::t('app','Update Language') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Language',
            'url' => ['/shopconfig/admin/language'],
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
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php
                    if(isset($option['title']) && !empty($option['title']))
                        echo $option['title'] ;
                    else
                        echo ($model->isNewRecord) ? Yii::t('app','Create') : Yii::t('app','Update') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? ['language/create'] : ['language/update','id'=> $model->language_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shopconfig/admin/language'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'language_id')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['language'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'language')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['name_ascii'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'name_ascii')->textInput(['maxlength' => true])->label(false) ?></div>
                        <?php
                            $countries = ArrayHelper::map(Countries::find()->all(),'countries_iso_code_2','countries_name');
                        ?>
                        <label class="col-sm-2"><?= $labels['country'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'country')->dropDownList($countries,['maxlength' => true])->label(false) ?></div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['is_rtl'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'is_rtl')->dropDownList(ConfirmStatus::getConstantsByValue(),['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['status'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'status')->dropDownList(ActivateStatus::getConstantsByValue() ,['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>
