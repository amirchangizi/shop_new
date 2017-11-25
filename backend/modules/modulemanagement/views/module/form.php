<?php

use yii\helpers\Url;


$labels = $model->attributeLabels();

?>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['title'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['module_name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'module_name')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['ordering'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'ordering')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['position'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'position')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>


                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['module_path'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'module_path')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['core'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'core')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['maxlength' => true])->label(false) ?></div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['config'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'config')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['client'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'client')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['maxlength' => true])->label(false) ?></div>
                    </div>

                    <div class="col-sm-12">

                        <label class="col-sm-2"><?= $labels['published'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'published')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['showtitle'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'showtitle')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['maxlength' => true])->label(false) ?></div>
                    </div>



                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['checked_out'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'checked_out')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['checked_out_time'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'checked_out_time')->textarea(['maxlength' => true])->label(false) ?>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['publish_up'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'publish_up')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['publish_down'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'publish_down')->textarea(['maxlength' => true])->label(false) ?>

                        </div>
                    </div>


                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['params'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'params')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['added_user'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'added_user')->textarea(['maxlength' => true])->label(false) ?>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['date_added'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'date_added')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['modified_user'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'modified_user')->textarea(['maxlength' => true])->label(false) ?>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['date_modified'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'date_modified')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['language_id'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'language_id')->textarea(['maxlength' => true])->label(false) ?>

                        </div>
                    </div>


                </div>

            </div>

