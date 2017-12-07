<?php

use common\helpers\LanguageHelper;
use common\models\enums\ActivateStatus;
use infinitydesign\jalaliDatePicker\jalaliDatePicker;
use \common\helpers\JdfHelper;

$jdf =  new JdfHelper;
?>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['name'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'name')->textInput( ['maxlength' => true])->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['tag'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'tag')->textInput(['maxlength' => true])->label(false) ?></div>
    </div>

</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['date_available'] ?></label>
        <div class="col-sm-4 ">
            <?php
                echo $form->field(
                    $model,
                    'date_available'
                )
                    ->widget(
                        jalaliDatePicker::className(), [
                        'options' => array(
                            'format' => 'yyyy/mm/dd',
                            'viewformat' => 'yyyy/mm/dd',
                            'placement' => 'right',
                            'todayBtn'=> 'linked',
                        ),
                        'htmlOptions' => [
                            'id' => 'availableDate',
                            'class'	=> 'form-control',
                            'placeholder' => '1396/05/05',
                            //'readonly' => 'readonly',
                            'value' => !$model->isNewRecord ? $jdf->jdate('Y/m/d',$model->date_available) : null
                        ]
                    ])->label(false);
            ?>
        </div>
        <label class="col-sm-2"><?= $labels['date_expire'] ?></label>
        <div class="col-sm-4 ">
            <?php

            echo $form->field(
                $model,
                'date_expire'
            )
                ->widget(
                    jalaliDatePicker::className(), [
                    'options' => array(
                        'format' => 'yyyy/mm/dd',
                        'viewformat' => 'yyyy/mm/dd',
                        'placement' => 'right',
                        'todayBtn'=> 'linked',
                    ),
                    'htmlOptions' => [
                        'id' => 'expiredate',
                        'class'	=> 'form-control',
                        'placeholder' => '1396/05/05',
                        //'readonly' => 'readonly',
                        'value' => !$model->isNewRecord ? $jdf->jdate('Y/m/d',$model->date_expire) : null
                    ]
                ])->label(false);
            ?>
        </div>
    </div>
</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['status'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'status')->dropDownList(ActivateStatus::listData())->label(false) ?></div>
        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
        <div class="col-sm-4 "><?= $form->field($model, 'language_id')->dropDownList(LanguageHelper::getByValue())->label(false) ?></div>
    </div>
</div>

<div class="row" id="form-element">

    <div class="col-sm-12">
        <label class="col-sm-2"><?= $labels['description'] ?></label>
        <div class="col-sm-10 "><?= $form->field($model, 'description')->textarea(['maxlength' => true])->label(false) ?></div>
    </div>

</div>