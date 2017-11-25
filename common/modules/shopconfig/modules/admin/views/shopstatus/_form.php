<?php


use common\helpers\LanguageHelper;
use common\models\enums\SectionStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;


$this->title = ($model->isNewRecord) ? Yii::t('app','Create Shop Status') : Yii::t('app','Update Shop Status') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Shop Status',
            'url' => ['/shopconfig/admin/shopstatus'],
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
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Shop Status') : Yii::t('app','Update Shop Status') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->status_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shopconfig/admin/shopstatus'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['status_name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'status_name')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['status_section'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'status_section')->dropDownList(SectionStatus::listData(),['maxlength' => true])->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'language_id')->dropDownList(LanguageHelper::getByValue(),['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 "></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>
