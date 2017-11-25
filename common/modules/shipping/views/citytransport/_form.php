<?php

use common\helpers\TaxHelper;
use common\models\enums\ActivateStatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;



//$this->title = ($model->isNewRecord) ? Yii::t('app','Create City transport') : Yii::t('app','Update Language') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'City Transport',
            'url' => ['/shipping/citytransport'],
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
                        //echo ($model->isNewRecord) ? Yii::t('app','Create') : Yii::t('app','Update') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',(Yii::$app->controller->action->id == 'create') ? ['citytransport/create'] : ['citytransport/update','method'=> $settingModel[0]->method ,'language'=> $settingModel[0]->language_id  ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shipping/citytransport'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <?php
                    $rate = null ;
                        if(!empty($settingParams))
                            $rate = isset($settingParams['rangeRate']) ? $settingParams['rangeRate'] : null ;
                    ?>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['rangeRate'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'rangeRate')->textarea(['value'=>$rate,'maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['taxClass'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'taxClass')->dropDownList(TaxHelper::getByValue())->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['zone'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'zone')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['status'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'status')->dropDownList(ActivateStatus::getConstantsByValue() ,['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>
