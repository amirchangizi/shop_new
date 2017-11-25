<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$labels = $model->attributeLabels();

$confirm = [
        0 => Yii::t('app','No'),
        1 => Yii::t('app','Yes')
] ;


?>

<div class="row">
    <div class="col-sm-12">
        <div class="widget-box">

            <?php $form = ActiveForm::begin([
                 'action'=> Yii::$app->urlManager->createUrl('users/set') ,
                'id'=>Yii::$app->controller->id.'-form',
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php //echo ($model->isNewRecord) ? Yii::t('app','Create') : Yii::t('app','Update') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>', null , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Yii::$app->urlManager->createUrl('/module/index') ?>">
                        <i class="ace-icon fa fa-times"></i>
                    </a>


                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['maxAttempts'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'maxAttempts')->textInput(['value'=>isset($config['maxAttempts'])?$config['maxAttempts']:5,'maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['enableRegistration'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'enableRegistration')->dropDownList($confirm,['options' =>[isset($config['enableRegistration'])?$config['enableRegistration']:0=>['Selected' => true]] ,'maxlength' => true])->label(false) ?></div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['useSocialAsLogin'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'useSocialAsLogin')->dropDownList($confirm,['options' =>[isset($config['useSocialAsLogin'])?$config['useSocialAsLogin']:0=>['Selected' => true]] ,'maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['sendEmailAfterRegister'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'sendEmailAfterRegister')->dropDownList($confirm,['options' =>[isset($config['sendEmailAfterRegister'])?$config['sendEmailAfterRegister']:0=>['Selected' => true]] ,'maxlength' => true])->label(false) ?></div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['confirmationTokenExpire'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'confirmationTokenExpire')->textInput(['value'=>isset($config['confirmationTokenExpire'])? $config['confirmationTokenExpire']:3600,'maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['attemptsTimeout'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'attemptsTimeout')->textInput(['value'=>isset($config['attemptsTimeout'])?$config['attemptsTimeout']:60,'maxlength' => true])->label(false) ?></div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['imagesFolder'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'imagesFolder')->textInput(['value'=>isset($config['imagesFolder'])?$config['imagesFolder']:'@webroot/images/users/','maxlength' => true])->label(false) ?></div>
                        <?= $form->field($model, 'moduleId')->hiddenInput(['value'=>$id])->label(false) ?>
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 "></div>
                    </div>



                </div>

            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>
