<?php

use common\helpers\ZoneHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\Zones */
/* @var $form yii\widgets\ActiveForm */


$this->title = ($model->isNewRecord) ? Yii::t('app','Create Zone') : Yii::t('app','Update Zone') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Zone',
            'url' => ['/shopconfig/admin/zones'],
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
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Zone') : Yii::t('app','Update Zone') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->zone_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shopconfig/admin/zones'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['zone_name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'zone_name')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['zone_code'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'zone_code')->textInput(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['zone_country_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'zone_country_id')->dropDownList(ZoneHelper::getCountry() ,['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 "></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>


