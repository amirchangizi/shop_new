<?php


use app\modules\usermanagement\models\Usergroups;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

$this->title = ($model->isNewRecord) ? Yii::t('app','Create User Group') : Yii::t('app','Update User Group ') ;

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
            'label' => Yii::t('app','User Group'),
            'url' => ['/usermanagement/usergroup/index'],
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

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=> $model->id ] , [
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
                        <label class="col-sm-2"><?= $labels['parent_id'] ?></label>
                        <?php
                            $query = Usergroups::find();
                            if(!$model->isNewRecord)
                               $query->where(['not in','id',[$model->id]]) ;
                            $parent = ArrayHelper::map($query->all(),'id','title');
                        ?>
                        <div class="col-sm-4 "><?= $form->field($model, 'parent_id')->dropDownList($parent ,['prompt'=>Yii::t('app','-- select an item --') ,'maxlength' => true])->label(false) ?></div>

                    </div>

                    <div class="col-sm-12">
                        <div class="col-sm-4 "><?= $form->field($model, 'default')->checkbox(['maxlength' => true])->label(false) ?></div>
                        <label class="col-sm-2"></label>
                        <label class="col-sm-2"></label>

                        <div class="col-sm-4 "></div>

                    </div>


                </div>


            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>







