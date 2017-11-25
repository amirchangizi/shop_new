<?php

use common\helpers\LanguageHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\LengthClass */
/* @var $form yii\widgets\ActiveForm */

$this->title = ($model->isNewRecord) ? Yii::t('app','Create Length') : Yii::t('app','Update Length') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Length',
            'url' => ['/shopconfig/admin/length'],
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
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Length') : Yii::t('app','Update Length') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->length_class_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shopconfig/admin/length'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['title'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['unit'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'unit')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['value'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'value')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'language_id')->dropDownList(LanguageHelper::getByValue(),['maxlength' => true])->label(false) ?></div>


                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>

