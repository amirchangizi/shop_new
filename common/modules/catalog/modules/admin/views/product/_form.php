<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\jui\JuiAsset;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Product */
/* @var $form yii\widgets\ActiveForm */


$this->title = ($model->isNewRecord) ? Yii::t('app','Create Product') : Yii::t('app','Update Product') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Product',
            'url' => ['/catalog/admin/product'],
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
                'id'=>'product-form',
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php echo ($model->isNewRecord) ? Yii::t('app','Create Product') : Yii::t('app','Update Product') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->product_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/catalog/admin/product'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>

                </span>
            </div>

            <div class="widget-body">

                <?php

                    echo Tabs::widget([
                        'items' => [
                            [
                                'label' => Yii::t('app','Public'),
                                'content' => Yii::$app->controller->renderPartial('_product',compact('model','form','labels')),
                                'active' => true
                            ],
                            [
                                'label' => Yii::t('app','Information'),
                                'content' => Yii::$app->controller->renderPartial('_information',compact('model','form','labels')) ,
                                'headerOptions' => [],
                                'options' => ['id' => 'Information'],
                            ],
                            [
                                'label' => Yii::t('app','product links'),
                                'content' => Yii::$app->controller->renderPartial('_related',compact('model','categoryModel','relatedModel','form','labels')) ,
                                'headerOptions' => [],
                                'options' => ['id' => 'related'],
                            ],
                         /*   [
                                'label' => Yii::t('app','discount'),
                                'content' => Yii::$app->controller->renderPartial('_discount',compact('model' ,'discountModel' , 'form', 'labels')) ,
                                'headerOptions' => [],
                                'options' => ['id' => 'discount'],
                            ],*/
                            /*[
                                'label' => Yii::t('app','images'),
                                'content' => Yii::$app->controller->renderPartial('_images',compact('model' ,'imagesModel' , 'form', 'labels')) ,
                                'headerOptions' => [],
                                'options' => ['id' => 'images'],
                            ],*/


                        ],
                    ]);
                ?>



            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>

<?php
$this->registerJs("$('#source, #destination').listswap({
	truncate:true, 
	height:135, 
	is_scroll:true, 
});

$('#source_2, #destination_2').listswap({
	truncate:true, 
	height:162,
	label_add:'Add', 
	label_remove:'Remove', 
});

");
?>



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


//JuiAsset::register($this);

$this->registerJs($js);

?>
