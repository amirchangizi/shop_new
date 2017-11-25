<?php
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
use wbraganca\dynamicform\DynamicFormWidget;

?>

<div id="panel-option-values" class="panel panel-default">

    <div class="panel-heading">

        <h3 class="panel-title"><i class="fa fa-check-square-o"></i> Images </h3>

    </div>


    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.form-options-body',
        'widgetItem' => '.form-options-item',
        'min' => 1,
        'insertButton' => '.add-item',
        'deleteButton' => '.delete-item',
        'model' => $imagesModel[0],
        'formId' => 'product-form',
        'formFields' => [
            'product_id',
            'image',
            'sort_order',
            'product_image_id'
        ],

    ]); ?>


    <table class="table table-bordered table-striped margin-b-none">

        <thead>

        <tr>

            <th style="width: 90px; text-align: center"></th>

            <th style="width: 188px;">Image</th>

            <th style="width: 90px; text-align: center">Actions</th>

        </tr>

        </thead>

        <tbody class="form-options-body">

        <?php foreach ($imagesModel as $index => $image): ?>

            <tr class="form-options-item">

                <td class="sortable-handle text-center vcenter" style="cursor: move;">

                    <i class="fa fa-arrows"></i>

                </td>

                <td>

                    <?php if (!$image->isNewRecord): ?>

                        <?= Html::activeHiddenInput($image, "[{$index}]product_id"); ?>

                        <?= Html::activeHiddenInput($image, "[{$index}]product_image_id"); ?>
                        

                    <?php endif; ?>

                    <?php

//                    $modelImage = Image::findOne(['id' => $image->image_id]);
//
//                    $initialPreview = [];
//
//                    if ($modelImage) {
//
//                        $pathImg = Yii::$app->fileStorage->baseUrl . '/' . $modelImage->path;
//
//                        $initialPreview[] = Html::img($pathImg, ['class' => 'file-preview-image']);
//
//                    }

                    ?>

                    <?= $form->field($image, "[{$index}]image")->label(false)->widget(FileInput::classname(), [

                        'options' => [

                            'multiple' => false,

                            'accept' => 'image/*',

                            'class' => 'optionvalue-img'

                        ],

                        'pluginOptions' => [

                            'previewFileType' => 'image',

                            'showCaption' => false,

                            'showUpload' => false,

                            'browseClass' => 'btn btn-default btn-sm',

                            'browseLabel' => ' Pick image',

                            'browseIcon' => '<i class="glyphicon glyphicon-picture"></i>',

                            'removeClass' => 'btn btn-danger btn-sm',

                            'removeLabel' => ' Delete',

                            'removeIcon' => '<i class="fa fa-trash"></i>',

                            'previewSettings' => [

                                'image' => ['width' => '138px', 'height' => 'auto']

                            ],

                           // 'initialPreview' => $initialPreview,

                            'layoutTemplates' => ['footer' => '']

                        ]

                    ]) ?>



                </td>

                <td class="text-center vcenter">

                    <button type="button" class="delete-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

        <tfoot>

        <tr>

            <td colspan="2"></td>

            <td><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> New</button></td>

        </tr>

        </tfoot>

    </table>

    <?php DynamicFormWidget::end(); ?>

</div>
