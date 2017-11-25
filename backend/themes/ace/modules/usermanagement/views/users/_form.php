<?php


use app\modules\usermanagement\models\User;

use app\modules\usermanagement\models\UsergroupMap;
use app\modules\usermanagement\models\Usergroups;
use app\modules\usermanagement\UsermanagementModule;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

$this->title = ($model->isNewRecord) ? Yii::t('app','Create User') : Yii::t('app','Update User') ;

if(is_array($model->errors) && count($model->errors)>1 )
{
    $err = []  ;
    foreach ($model->errors as $error)
    {

        if(in_array($error[0],$err))
            continue ;
        $err[]= implode(',',$error) ;

    }
    echo implode(',',$err).'<br/>';

}
echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => Yii::t('app','User'),
            'url' => ['/usermanagement/users/index'],
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
                'options' => ['enctype' => 'multipart/form-data']
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

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? ['/usermanagement/users/create'] : ['/usermanagement/users/update' ,'id'=> $model->user_id ] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/usermanagement/users/index'])?>" >
                        <i class="ace-icon fa fa-times"></i>
                    </a>


                </span>
            </div>

            <div class="widget-body">

                <div class="row" id="form-element">

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['name'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['username'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                    <?php if($model->isNewRecord): ?>
                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['password'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"><?= $labels['repeat_password'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => true])->label(false) ?></div>

                    </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['parent_id'] ?></label>
                        <?php
                        $parent = ArrayHelper::map(User::find()->where(['block'=>0])->all(),'user_id' ,'name') ;
                        ?>
                        <div class="col-sm-4 "><?= $form->field($model, 'parent_id')->dropDownList($parent,['prompt'=> UserManagementModule::t('user','-- Select an item --'),'maxlength' => true])->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['email'] ?></label>
                        <div class="col-sm-4 "> <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"><?= $labels['age'] ?></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'age')->textInput()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['about_me'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'about_me')->textarea(['maxlength' => true])->label(false) ?>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 "><?= $form->field($model, 'block')->checkbox()->label(false) ?></div>

                        <label class="col-sm-2"><?= $labels['user_image'] ?></label>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'imageFile')->fileInput()->label(false) ?>
                        </div>


                    </div>

                    <div class="col-sm-12">


                        <div class="col-sm-2 "><?= 'category' ?></div>
                        <div class="col-sm-4 ">
                            <?php
                                $selected =[] ;
                                $group = ArrayHelper::map(Usergroups::find()->all(),'id','title') ;
                                if(!$model->isNewRecord)
                                {
                                    $items = UsergroupMap::findAll(['user_id'=>$model->user_id]) ;
                                    foreach ($items as $map)
                                        $selected[$map->group_id] = ['Selected' => true];
                                }

//                                print_r($selected) ;
//
//                                exit;



                            ?>
                            <?= $form->field($groupMap, 'group_id')->dropDownList($group,['options' => $selected,'multiple'=>true ,'class'=>'multiselect' ,'id'=>'food'])->label(false) ?>

                        </div>
                        <label class="col-sm-2"></label>
                        <div class="col-sm-4 ">

                        </div>



                    </div>

                </div>




            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>


