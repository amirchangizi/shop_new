<?php

use common\modules\customermanagement\CustomermanagementModule;
use common\modules\customermanagement\models\Customers;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\customermanagement\models\Customers */
/* @var $form yii\widgets\ActiveForm */

$this->title = ($model->isNewRecord) ? Yii::t('app','Create '.Yii::$app->controller->id) : Yii::t('app','Update '.Yii::$app->controller->id.' '.(isset($option['name']) ? $option['name']: '')) ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => Yii::$app->controller->id,
            'url' => ['/customermanagement/admin/customers'],
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

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->customer_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/customermanagement/admin/customers'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>


                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['customer_name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'customer_name')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['customer_username'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'customer_username')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                    <?php if($model->isNewRecord): ?>
                        <div class="col-sm-12">
                            <label class="col-sm-2"><?= $labels['customer_password'] ?></label>
                            <div class="col-sm-4 "><?= $form->field($model, 'customer_password')->passwordInput(['maxlength' => true])->label(false) ?></div>
                            <label class="col-sm-2"><?= $labels['repeat_password'] ?></label>
                            <div class="col-sm-4 "><?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => true])->label(false) ?></div>

                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['customer_parent_id'] ?></label>
                        <?php
                        $parent = ArrayHelper::map(Customers::find()->where(['is_block'=>0])->all(),'customer_id' ,'customer_name') ;
                        ?>
                        <div class="col-sm-4 "><?= $form->field($model, 'customer_parent_id')->dropDownList($parent,['prompt'=> Yii::t('app','-- Select an item --'),'maxlength' => true])->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['customer_email'] ?></label>
                        <div class="col-sm-4 "> <?= $form->field($model, 'customer_email')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['phone'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'phone')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['mobile'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'is_block')->checkbox()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['customer_max_credit'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'customer_max_credit')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>



