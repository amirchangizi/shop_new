<?php
use common\helpers\LengthHelper;
use common\helpers\ManufacturerHelper;
use common\helpers\ShopstatusHelper;
use common\helpers\TaxHelper;
use common\helpers\WeightHelper;
use common\models\enums\ConfirmStatus;

?>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['model'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'model')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['image'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'image')->fileInput()->label(false) ?></div>
    </div>

</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['sku'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'sku')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['upc'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'upc')->textInput(['maxlength' => true])->label(false) ?></div>
    </div>

</div>


<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['ean'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'ean')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['jan'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'jan')->textInput(['maxlength' => true])->label(false) ?></div>
    </div>

</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['isbn'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'isbn')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['mpn'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'mpn')->textInput(['maxlength' => true])->label(false) ?></div>
    </div>

</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['quantity'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'quantity')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['stock_status_id'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'stock_status_id')->dropDownList(ShopstatusHelper::getStatusBySection('Stock Status',$model->language_id),['maxlength' => true])->label(false) ?></div>
    </div>

</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['manufacturer_id'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'manufacturer_id')->dropDownList(ManufacturerHelper::getManufacturer())->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['shipping'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'shipping')->dropDownList(ConfirmStatus::listData() ,['maxlength' => true])->label(false) ?></div>
    </div>

</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['price'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'price')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['tax_class_id'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'tax_class_id')->dropDownList(TaxHelper::getByValue(),['prompt'=>Yii::t('app','No Tax')])->label(false) ?></div>
    </div>

</div>


<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['weight'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'weight')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['weight_class_id'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'weight_class_id')->dropDownList(WeightHelper::getWeight())->label(false) ?></div>
    </div>
</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['length'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'length')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['length_class_id'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'length_class_id')->dropDownList(LengthHelper::getLength())->label(false) ?></div>
    </div>
</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['width'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'width')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['height'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'height')->textInput(['maxlength' => true])->label(false) ?></div>
    </div>
</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['Special'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'Special')->dropDownList(ConfirmStatus::listData())->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['subtract'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'subtract')->dropDownList(ConfirmStatus::listData())->label(false) ?></div>
    </div>
</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['minimum'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'minimum')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['sort_order'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'sort_order')->textInput(['maxlength' => true])->label(false) ?></div>
    </div>
</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['movie'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'movie')->fileInput()->label(false) ?></div>
        <label class="col-sm-2"></label>
        <div class="col-sm-4 "></div>
    </div>
</div>

