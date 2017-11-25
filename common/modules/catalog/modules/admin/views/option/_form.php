<?php

use common\helpers\LanguageHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Option */
/* @var $form yii\widgets\ActiveForm */


$this->title = ($model->isNewRecord) ? Yii::t('app','Create Option') : Yii::t('app','Update Option') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Option',
            'url' => ['/catalog/admin/option'],
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
                'id'=>'dynamic-form',
                'enableClientValidation' => false,
                'enableAjaxValidation' => true,
                'validateOnChange' => true,
                'validateOnBlur' => false,
                'options' => [
                    'enctype' => 'multipart/form-data',
                ]
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Option') : Yii::t('app','Update Option') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->option_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/catalog/admin/option'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'name')->textInput( ['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['type'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'type')->textInput(['maxlength' => true])->label(false) ?></div>
                    </div>

                </div>

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['sort_order'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'sort_order')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'language_id')->dropDownList(LanguageHelper::getByValue())->label(false) ?></div>

                    </div>

                </div>

                <?= $this->render('_form_option_values', [
                    'form' => $form,
                    'modelCatalogOption' => $model,
                    'modelsOptionValue' => $modelsOptionValue
                ])  ?>


            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>

<?php
$js = <<<'EOD'


$(".optionvalue-img").on("filecleared", function(event) {

    var regexID = /^(.+?)([-\d-]{1,})(.+)$/i;

    var id = event.target.id;

    var matches = id.match(regexID);

    if (matches && matches.length === 4) {

        var identifiers = matches[2].split("-");

        $("#optionvalue-" + identifiers[1] + "-deleteimg").val("1");

    }

});


var fixHelperSortable = function(e, ui) {

    ui.children().each(function() {

        $(this).width($(this).width());

    });

    return ui;

};


$(".form-options-body").sortable({

    items: "tr",

    cursor: "move",

    opacity: 0.6,

    axis: "y",

    handle: ".sortable-handle",

    helper: fixHelperSortable,

    update: function(ev){

        $(".dynamicform_wrapper").yiiDynamicForm("updateContainer");

    }

}).disableSelection();


EOD;

JuiAsset::register($this);

$this->registerJs($js);
?>
