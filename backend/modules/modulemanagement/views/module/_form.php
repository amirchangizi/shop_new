<?php



/* @var $this yii\web\View */
/* @var $model app\modules\modulemanagement\models\Modules */
/* @var $form yii\widgets\ActiveForm */

use yii\bootstrap\Tabs;
use yii\widgets\Breadcrumbs;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;



$this->title = ($model->isNewRecord) ? Yii::t('app','Create '.Yii::$app->controller->id) : Yii::t('app','Update '.Yii::$app->controller->id.' '.(isset($option['name']) ? $option['name']: '')) ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => Yii::$app->controller->id,
            'url' => [Yii::$app->controller->id.'/index'],
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
                'id'=>Yii::$app->controller->id.'-form',
                //'options' => ['enctype' => 'multipart/form-data']
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php
                    if(isset($option['title']) && !empty($option['title']))
                        echo $option['title'] ;
                    else
                        echo ($model->isNewRecord) ? Yii::t('app','Create') : Yii::t('app','Update') ?>
                </h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->module_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to([Yii::$app->controller->id.'/index'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>


                </span>
            </div>



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

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>


