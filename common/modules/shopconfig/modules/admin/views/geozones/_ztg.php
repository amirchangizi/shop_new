<?php
use common\helpers\ZoneHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 4, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $ztgModel[0],
    'formId' => 'geozones-form',
    'formFields' => [
        'zone_country_id',
        'zone_id',
    ],

]); ?>

    <div class="panel panel-default">

        <div class="panel-heading">

            <i class="fa fa-envelope"></i>

            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Zone</button>

            <div class="clearfix"></div>

        </div>

        <div class="panel-body container-items"><!-- widgetContainer -->

            <?php foreach ($ztgModel as $index => $modelztg): ?>

                <div class="item panel panel-default"><!-- widgetBody -->

                    <div class="panel-heading">

                        <span class="panel-title-address">Address: <?= ($index + 1) ?></span>

                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>

                        <div class="clearfix"></div>

                    </div>

                    <div class="panel-body">

                        <?php

                        // necessary for update action.

                        if (!$modelztg->isNewRecord) {

                            echo Html::activeHiddenInput($modelztg, "[{$index}]id");

                        }

                        ?>

                        <?= $form->field($modelztg, "[{$index}]zone_country_id")->dropDownList(ZoneHelper::getCountry()) ?>


                        <div class="row">

                            <div class="col-sm-6">

                                <?= $form->field($modelztg, "[{$index}]zone_id")->dropDownList(ZoneHelper::getZoneByCountry(1)) ?>

                            </div>


                        </div><!-- end:row -->

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

<?php DynamicFormWidget::end(); ?>