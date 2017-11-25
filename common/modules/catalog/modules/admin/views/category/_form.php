<?php

use common\helpers\CategoryHelper;
use common\helpers\LanguageHelper;
use common\models\enums\ActivateStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Category */
/* @var $form yii\widgets\ActiveForm */

$this->title = ($model->isNewRecord) ? Yii::t('app','Create Category') : Yii::t('app','Update Category') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Category',
            'url' => ['/catalog/admin/category'],
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
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Category') : Yii::t('app','Update Category') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->category_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/catalog/admin/category'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['description'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'description')->textarea(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <?php
                        $selected = [] ;
                        if($model->isNewRecord)
                            $parents = CategoryHelper::getAllCategory() ;
                        else
                        {
                            $parents = CategoryHelper::getCategoryWithoutName($model->name) ;
                            $selected = [$model->parent->name => ['Selected' => true ]] ;
                        }

                    ?>
                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['categoryName'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'categoryName')->dropDownList( $parents ,['options' => $selected,'maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['image'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'image')->fileInput([])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['status'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'status')->dropDownList(ActivateStatus::listData() ,['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'language_id')->dropDownList(LanguageHelper::getByValue(),['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['meta_keyword'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'meta_keyword')->textarea(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['meta_description'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'meta_description')->textarea(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>
