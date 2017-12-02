<?php


?>


<div class="row">

    <div class="col-md-6">
        <label ><?= Yii::t('app','customer name') ?></label>
        <h4><?= $model->customer->customer_name ?></h4>
    </div>

    <div class="col-md-6">
        <label ><?= Yii::t('app','customer group') ?></label>
        <h4><?= $model->customer->customerGroup->name ?></h4>
        <h4></h4>
    </div>

</div>


<div class="row">

    <div class="col-md-6">
        <label ><?= Yii::t('app','customer email') ?></label>
        <h4><?= $model->customer->customer_email ?></h4>
    </div>

    <div class="col-md-6">
        <label ><?= Yii::t('app','customer phone') ?></label>
        <h4><?= $model->customer->phone ?></h4>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <label ><?= Yii::t('app','customer mobile') ?></label>
        <h4><?= $model->customer->mobile ?></h4>
    </div>

    <div class="col-md-6">
        <label ><?= Yii::t('app','Shipping Detail') ?></label>
        <h4><?= $model->Shipping ?></h4>
    </div>

</div>
