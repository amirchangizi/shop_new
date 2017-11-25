<?php

use common\helpers\CustomerHelper;
use farsidesign\jalalidatepicker\DatePicker;
use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;

$js = '

jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {

        jQuery(this).html("Address: " + (index + 1))

    });

});


jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {

    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {

        jQuery(this).html("Address: " + (index + 1))

    });

});

';


$this->registerJs($js);

?>

<?php DynamicFormWidget::begin([

    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]

    'widgetBody' => '.container-items', // required: css class selector

    'widgetItem' => '.item', // required: css class

    'limit' => 4, // the maximum times, an element can be cloned (default 999)

    'min' => 0, // 0 or 1 (default 1)

    'insertButton' => '.add-item', // css class

    'deleteButton' => '.remove-item', // css class

    'model' => $discountModel[0],

    'formId' => 'product-form',

    'formFields' => [
        'customer_group_id',
        'quantity',
        'priority',
        'price',
        'date_start',
        'date_end',
        'product_id'

    ],

]); ?>

<div class="panel panel-default">

    <div class="panel-heading">

        <i class="fa fa-envelope"></i> Product Discount

        <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add discount</button>

        <div class="clearfix"></div>

    </div>

    <div class="panel-body container-items"><!-- widgetContainer -->

        <?php foreach ($discountModel as $index => $discount): ?>

            <div class="item panel panel-default"><!-- widgetBody -->

                <div class="panel-heading">

                    <span class="panel-title-address">Discount: <?= ($index + 1) ?></span>

                    <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>

                    <div class="clearfix"></div>

                </div>

                <div class="panel-body">

                    <?php

                    // necessary for update action.

                    if (!$discount->isNewRecord) {

                        echo Html::activeHiddenInput($discount, "[{$index}]product_discount_id");
                        echo Html::activeHiddenInput($discount, "[{$index}]product_id");

                    }

                    ?>

                    <?= $form->field($discount, "[{$index}]customer_group_id")->dropDownList(CustomerHelper::getCustomerGroupByvalue(),['prompt' => '-- Select an item --']) ?>


                    <div class="row">

                        <div class="col-sm-6">

                            <?= $form->field($discount, "[{$index}]quantity")->textInput(['maxlength' => true]) ?>

                        </div>

                        <div class="col-sm-6">

                            <?= $form->field($discount, "[{$index}]priority")->textInput(['maxlength' => true]) ?>

                        </div>

                    </div><!-- end:row -->


                    <div class="row">

                        <div class="col-sm-6">

                            <?= $form->field($discount, "[{$index}]price")->textInput(['maxlength' => true]) ?>

                        </div>

                        <div class="col-sm-6">

                            <?= $form->field($discount, "[{$index}]date_start")->widget(DatePicker::classname(), [
                                //'theme' => 'blue',
                                'clientOptions' => [
                                    'format' => 'YYYY/MM/DD',
                                    'class' => 'form-control',
                                ]
                            ]) ?>

                        </div>

                    </div><!-- end:row -->


                    <div class="row">

                        <div class="col-sm-6">

                            <?= $form->field($discount, "[{$index}]date_end")->widget(DatePicker::classname(), [
                                //'theme' => 'blue',
                                'clientOptions' => [
                                    'format' => 'YYYY/MM/DD',
                                    'class' => 'form-control',
                                ]
                            ]) ?>

                        </div>


                    </div><!-- end:row -->

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

<?php DynamicFormWidget::end(); ?>


